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

    public function downloadTroubleshootersReport()
    {
        // Se asegura de cargar solo las relaciones de agenda (sin 'attendances')
        $participants = SessionParticipant::with([
            'participant.user',
            'session.applicantForm.applicant.user',
            'session.room',
        ])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados del reporte simplificado (6 columnas)
        $headers = [
            'Participant',
            'Topic',
            'Presenter',
            'Session Date',
            'Session Time (Start-End)',
            'Room',
        ];
        $sheet->fromArray($headers, null, 'A1');

        // Estilo de encabezado (A1 a F1)
        $sheet->getStyle('A1:F1')->applyFromArray([
            // Color distintivo para diferenciarlo del reporte completo
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFC107']],
            'font' => ['bold' => true, 'color' => ['rgb' => '343A40']],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);

        $row = 2;
        foreach ($participants as $sp) {

            $presenterUser = $sp->presenterUser();
            $session = $sp->session;

            // --- Lógica de Sesión ---
            $sessionDate = $session?->date?->format('d/m/Y') ?? '-';
            $sessionStartTime = $session?->start_time?->format('H:i') ?? '-';
            $sessionEndTime = $session?->end_time?->format('H:i') ?? '-';

            $sessionTimeRange = ($sessionStartTime !== '-' && $sessionEndTime !== '-')
                ? $sessionStartTime . ' - ' . $sessionEndTime
                : $sessionStartTime;

            $sessionRoom = $session?->room?->name ?? '-';

            // Participant
            $participantName = $sp->participant?->user?->name . ' ' . $sp->participant?->user?->lastname;
            // Topic
            $topic = $sp->topic() ?? '-';
            // Presenter
            $presenterName = $presenterUser
                ? $presenterUser->name . ' ' . $presenterUser->lastname
                : '-';

            // Escribir datos (6 columnas)
            $sheet->setCellValue("A{$row}", $participantName);
            $sheet->setCellValue("B{$row}", $topic);
            $sheet->setCellValue("C{$row}", $presenterName);
            $sheet->setCellValue("D{$row}", $sessionDate);
            $sheet->setCellValue("E{$row}", $sessionTimeRange);
            $sheet->setCellValue("F{$row}", $sessionRoom);

            $row++;
        }

        // Auto-size columns (rango hasta 'F')
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = "troubleshooters_report_" . date('Ymd_His') . ".xlsx";
        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }
}
