<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ApplicantParticipant;
use App\Models\Attendance;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class AttendanceDashboard extends Component
{
    use WithPagination;

    public string $search = '';
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Marcar asistencia
    public function markAsAttended($participantId)
    {
        Attendance::updateOrCreate(
            ['applicant_participant_id' => $participantId],
            [
                'attended'      => true,
                'checked_in_at' => now()
            ]
        );

        session()->flash('message', 'Asistencia registrada correctamente.');
    }

    public function downloadReport()
    {
        $participants = ApplicantParticipant::with(['participant.user', 'applicant.user', 'attendances'])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezado
        $headers = ['Participante', 'Tema', 'Expositor', 'Asistió', 'Fecha'];
        $sheet->fromArray($headers, null, 'A1');

        $headerStyle = [
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50']
            ],
            'font' => [
                'bold'  => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ]
        ];

        $sheet->getStyle('A1:E1')->applyFromArray($headerStyle);

        // Datos
        $rowNumber = 2;
        foreach ($participants as $ap) {
            $attendance         = $ap->attendances->first();
            $fullName           = $ap->participant->user->name . ' ' . $ap->participant->user->lastname;
            $fullNameExpositor  = $ap->applicant->user->name . ' ' . $ap->applicant->user->lastname;

            $sheet->setCellValue("A{$rowNumber}", $fullName);
            $sheet->setCellValue("B{$rowNumber}", $ap->applicant->title);
            $sheet->setCellValue("C{$rowNumber}", $fullNameExpositor);
            $sheet->setCellValue("D{$rowNumber}", $attendance?->attended ? 'Sí' : 'No');
            $sheet->setCellValue("E{$rowNumber}", $attendance?->checked_in_at?->format('d/m/Y H:i') ?? '-');
            $rowNumber++;
        }

        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "reporte_asistencia_" . date('Ymd_His') . ".xlsx";
        $writer   = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }

    public function render()
    {
        $participants = ApplicantParticipant::with(['participant.user', 'applicant.user', 'attendances'])
            ->whereHas('participant.user', function ($q) {
                $q->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhereHas('applicant', function ($q) {
                $q->where('title', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.dashboard.attendance-dashboard', [
            'applicantParticipants' => $participants
        ]);
    }
}
