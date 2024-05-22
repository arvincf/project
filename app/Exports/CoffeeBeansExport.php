<?php

namespace App\Exports;

use App\Models\Coffeebeans;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Style\Style as DefaultStyle;

class CoffeeBeansExport implements FromView, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private $beans, $groupedBeans;

    public function __construct($range)
    {
        $this->beans = new Coffeebeans;
        $now = Carbon::now();

        switch ($range) {
            case 'weekly':
                $start = $now->startOfWeek()->toDateString();
                $end = $now->endOfWeek()->toDateString();
                break;

            case 'monthly':
                $start = $now->startOfMonth()->toDateString();
                $end = $now->endOfMonth()->toDateString();
                break;

            case 'annually':
                $start = $now->startOfYear()->toDateString();
                $end = $now->endOfYear()->toDateString();
                break;

            default:
                $start = $now->startOfWeek()->toDateString();
                $end = $now->endOfWeek()->toDateString();
                break;
        };

        $this->groupedBeans = $this->beans
            ->whereBetween('created_at', [$start, $end])
            ->get();
    }

    public function view(): View
    {
        return view('userpage.beansExport', [
            'groupedBeans' => $this->groupedBeans
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow    = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $header        = 'A1:' . $highestColumn . '1';
        $sheet->getRowDimension(1)->setRowHeight(40);
        $mergedCells = ['A1:D1'];

        foreach ($mergedCells as $cellRange) {
            $sheet->mergeCells($cellRange);
            $sheet->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        }

        $sheet->getStyle($header)->getFont()->setSize(12);
        $sheet->getStyle($header)->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle($header)->getFill()->getStartColor()->setRGB('22c55e');
        $sheet->getStyle('A2:D2')->getFont()->setBold(true);
        $sheet->getStyle('A1:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A' . $highestRow)->getAlignment()->setWrapText(true);
    }

    public function defaultStyles(DefaultStyle $defaultStyle)
    {
        return [
            'font' => [
                'name' => 'Calibri',
                'size' => 9,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ]
        ];
    }
}
