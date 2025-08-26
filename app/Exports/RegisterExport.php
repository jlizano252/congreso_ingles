<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RegisterExport implements FromCollection, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithStyles, WithTitle, WithColumnFormatting
{
    protected $type;

    public function __construct($type = 'participants')
    {
        $this->type = $type;
    }

    public function collection()
    {
        $query = DB::table('users as us')
            ->leftJoin('applicants as ap', 'us.id', '=', 'ap.user_id')
            ->leftJoin('applicant_forms as af', 'ap.id', '=', 'af.applicant_id')
            ->selectRaw("
                us.ide as IDE,
                CONCAT(UPPER(TRIM(us.name)), ' ', UPPER(TRIM(us.lastname))) as NAME,
                us.email as EMAIL,
                af.title as TITLE,
                af.participation_type as PARTICIPATION,
                DATE(us.created_at) as JOINED
            ")
            ->where('us.admin', 0);

        if ($this->type === 'participants') {
            // trae solo los que tienen participant (como ya lo tenías)
            $query->join('participants as pa', 'us.id', '=', 'pa.user_id');
        } elseif ($this->type === 'applicants') {
            // trae solo los que tienen applicant (y applicant_forms si existen)
            $query->whereNotNull('ap.id');
        }

        return $query->get();
    }

    public function title(): string
    {
        return ucfirst($this->type) . ' - ' . date('Y-m-d');
    }

    public function headings(): array
    {
        if ($this->type === 'applicants') {
            return ["IDE", "NAME", "EMAIL", "TITLE", "PARTICIPATION", "JOINED"];
        }

        return ["IDE", "NAME", "EMAIL", "PHONE", "JOINED"];
    }

    public function styles(Worksheet $sheet)
    {
        $default_title = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'color' => ['argb' => '1c780c'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ];

        // aplico estilo a la fila 1 (los encabezados)
        $lastColumn = $sheet->getHighestColumn();
        $sheet->getStyle("A1:{$lastColumn}1")->applyFromArray($default_title);

        $sheet->getStyle('A')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER
        ];
    }
}
