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
        // 🔹 CASO 1: EXPORT DE PARTICIPANTS
        if ($this->type === 'participants') {
            return DB::table('users as us')
                ->join('participants as pa', 'us.id', '=', 'pa.user_id')
                ->leftJoin('gender_types as gt', 'pa.gender_type', '=', 'gt.id')
                ->selectRaw("
                    us.ide as IDE,
                    CONCAT(UPPER(TRIM(us.name)), ' ', UPPER(TRIM(us.lastname))) as NAME,
                    us.email as USER_EMAIL,
                    pa.email as PARTICIPANT_EMAIL,
                    COALESCE(pa.phone, '') as PHONE,
                    COALESCE(gt.name, 'N/A') as GENDER,
                    CASE 
                        WHEN pa.has_allergy = 1 THEN 'YES' 
                        WHEN pa.has_allergy = 0 THEN 'NO'
                        ELSE 'N/A' 
                    END as DIETARY_CONSIDERATIONS,
                    COALESCE(pa.allergy_details, '') as DIETARY_DETAILS,
                    DATE(us.created_at) as JOINED
                ")
                ->where('us.admin', 0)
                ->get();
        }

        // 🔹 CASO 2: EXPORT DE APPLICANTS
        if ($this->type === 'applicants') {
            return DB::table('users as us')
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
                ->where('us.admin', 0)
                ->whereNotNull('ap.id')
                ->get();
        }

        // fallback (por si acaso)
        return collect();
    }

    public function title(): string
    {
        return ucfirst($this->type) . ' - ' . date('Y-m-d');
    }

    public function headings(): array
    {
        // 🔹 Encabezados de applicants
        if ($this->type === 'applicants') {
            return ["IDE", "NAME", "EMAIL", "TITLE", "PARTICIPATION", "JOINED"];
        }

        // 🔹 Encabezados de participants (con nuevos campos)
        return [
            "IDE",
            "NAME",
            "USER EMAIL",
            "PARTICIPANT EMAIL",
            "PHONE",
            "GENDER",
            "DIETARY CONSIDERATIONS",
            "DIETARY DETAILS",
            "JOINED"
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $headerStyle = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => '1c780c'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $lastColumn = $sheet->getHighestColumn();
        $sheet->getStyle("A1:{$lastColumn}1")->applyFromArray($headerStyle);
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER, // IDE
        ];
    }
}
