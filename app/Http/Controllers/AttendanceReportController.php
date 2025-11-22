<?php

namespace App\Http\Controllers;

use App\Models\SessionParticipant;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class AttendanceReportController extends Controller
{
    public function download()
    {
        $participants = SessionParticipant::with([
            'participant.user',
            'session.applicantForm.applicant.user',
            'attendances'
        ])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['Participant', 'Topic', 'Presenter', 'Attended', 'Date & Time', 'Comment'];
        $sheet->fromArray($headers, null, 'A1');

        $sheet->getStyle('A1:F1')->applyFromArray([
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '007BFF']],
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);

        $row = 2;
        foreach ($participants as $sp) {

            $attendance = $sp->attendances->first();
            $presenterUser = $sp->presenterUser();

            // Participant
            $participantName = $sp->participant?->user?->name . ' ' . $sp->participant?->user?->lastname;

            // Topic
            $topic = $sp->topic() ?? '-';

            // Presenter
            $presenterName = $presenterUser
                ? $presenterUser->name . ' ' . $presenterUser->lastname
                : '-';

            $sheet->setCellValue("A{$row}", $participantName);
            $sheet->setCellValue("B{$row}", $topic);
            $sheet->setCellValue("C{$row}", $presenterName);
            $sheet->setCellValue("D{$row}", $attendance?->attended ? 'Yes' : 'No');
            $sheet->setCellValue("E{$row}", $attendance?->checked_in_at?->format('d/m/Y H:i') ?? '-');
            $sheet->setCellValue("F{$row}", $attendance?->comment ?? '-');

            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "attendance_report_" . date('Ymd_His') . ".xlsx";
        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }
}
