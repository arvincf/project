<?php

namespace App\Exports;

use App\Models\Sales;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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


class SalesExport implements FromView, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private $sales, $groupedSales;

    public function __construct($range)
    {
        $this->sales = new Sales;
        $now = Carbon::now();

        switch ($range) {
            case 'weekly':
                $this->groupedSales = $this->sales
                    ->select(
                        'product_name',
                        DB::raw('SUM(product_quantity * price) AS total_cost'),
                        DB::raw('DATE_FORMAT(MIN(created_at - INTERVAL (WEEKDAY(created_at)) DAY), "%Y-%m-%d") AS period_start')
                    )
                    ->groupBy('product_name', DB::raw('DATE_FORMAT(created_at - INTERVAL (WEEKDAY(created_at)) DAY, "%Y-%m-%d")'))
                    ->orderBy('period_start')
                    ->get();
                break;

            case 'monthly':
                $this->groupedSales = $this->sales
                    ->select(
                        'product_name',
                        DB::raw('SUM(product_quantity * price) AS total_cost'),
                        DB::raw('DATE_FORMAT(MIN(created_at - INTERVAL (DAY(created_at) - 1) DAY), "%Y-%m-%d") AS period_start')
                    )
                    ->groupBy('product_name', DB::raw('DATE_FORMAT(created_at - INTERVAL (DAY(created_at) - 1) DAY, "%Y-%m-%d")'))
                    ->orderBy('period_start')
                    ->get();
                break;

            case 'annually':
                $this->groupedSales = $this->sales
                    ->select(
                        'product_name',
                        DB::raw('SUM(product_quantity * price) AS total_cost'),
                        DB::raw('DATE_FORMAT(MIN(created_at), "%Y-01-01") AS period_start')
                    )
                    ->groupBy('product_name', DB::raw('YEAR(created_at)'))
                    ->orderBy('period_start')
                    ->get();
                break;
        };
    }

    public function view(): View
    {
        return view('userpage.salesExport', [
            'groupedSales' => $this->groupedSales
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow    = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $header        = 'A1:' . $highestColumn . '1';
        $sheet->getRowDimension(1)->setRowHeight(40);
        $mergedCells = ['A1:C1'];

        foreach ($mergedCells as $cellRange) {
            $sheet->mergeCells($cellRange);
            $sheet->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        }

        $sheet->getStyle($header)->getFont()->setSize(11);
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
