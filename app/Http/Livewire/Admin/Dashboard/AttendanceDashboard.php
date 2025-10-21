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
    public string $generalComments = '';
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Mark participant as attended
    public function markAsAttended($participantId)
    {
        Attendance::updateOrCreate(
            ['applicant_participant_id' => $participantId],
            [
                'attended'      => true,
                'checked_in_at' => now(),
            ]
        );

        session()->flash('message', 'Attendance recorded successfully.');
    }

    // Save general comments only for participants who did NOT attend
    public function saveGeneralComments()
    {
        $participants = ApplicantParticipant::with('attendances')->get();

        foreach ($participants as $ap) {
            $attendance = $ap->attendances->first();

            // Solo guardar comentario si no asistió
            if (!$attendance?->attended) {
                Attendance::updateOrCreate(
                    ['applicant_participant_id' => $ap->id],
                    [
                        'attended'       => false, // se mantiene como no asistido
                        'comment'        => $this->generalComments,
                        'checked_in_at'  => $attendance?->checked_in_at ?? null,
                    ]
                );
            }
        }

        // Mostrar mensaje de éxito
        session()->flash('message', 'Comment saved for participants who did not attend.');

        // Limpiar el campo de comentario en la pantalla
        $this->generalComments = '';
    }

    // Download attendance report
    public function downloadReport()
    {
        $participants = ApplicantParticipant::with(['participant.user', 'applicant.user', 'attendances'])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['Participant', 'Topic', 'Presenter', 'Attended', 'Date & Time', 'Comment'];
        $sheet->fromArray($headers, null, 'A1');

        $headerStyle = [
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '007BFF']],
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        ];

        $sheet->getStyle('A1:F1')->applyFromArray($headerStyle);

        $rowNumber = 2;
        foreach ($participants as $ap) {
            $attendance = $ap->attendances->first();
            $fullName = $ap->participant->user->name . ' ' . $ap->participant->user->lastname;
            $presenter = $ap->applicant->user->name . ' ' . $ap->applicant->user->lastname;

            $sheet->setCellValue("A{$rowNumber}", $fullName);
            $sheet->setCellValue("B{$rowNumber}", $ap->applicant->title ?? '-');
            $sheet->setCellValue("C{$rowNumber}", $presenter);
            $sheet->setCellValue("D{$rowNumber}", $attendance?->attended ? 'Yes' : 'No');
            $sheet->setCellValue("E{$rowNumber}", $attendance?->checked_in_at?->format('d/m/Y H:i') ?? '-');
            $sheet->setCellValue("F{$rowNumber}", $attendance?->comment ?? '-');
            $rowNumber++;
        }

        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "attendance_report_" . date('Ymd_His') . ".xlsx";
        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }

    public function render()
    {
        $participants = ApplicantParticipant::with(['participant.user', 'applicant.user', 'attendances'])
            ->where(function ($query) {
                $query->whereHas('participant.user', function ($q) {
                    $q->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                })
                    ->orWhereHas('applicant', function ($q) {
                        $q->where('title', 'LIKE', '%' . $this->search . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.dashboard.attendance-dashboard', [
            'applicantParticipants' => $participants
        ]);
    }
}
