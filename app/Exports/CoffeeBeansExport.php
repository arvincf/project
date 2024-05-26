<?php

namespace App\Exports;

use App\Models\Coffeebeans;
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

class CoffeeBeansExport implements FromView, ShouldAutoSize, WithStyles, WithDefaultStyles
{
    use Exportable;

    private $beans, $groupedBeans;

    public function __construct($range)
    {
        $this->beans = new Coffeebeans;

        switch ($range) {
            case 'weekly':
                $this->groupedBeans = DB::select("
                        SELECT coffee_name, supplier_name,
                            MAX(period_start) AS period_start,
                            SUM(total_quantity) AS total_quantity
                        FROM (
                            SELECT coffee_name, supplier_name,
                                DATE_FORMAT(created_at - INTERVAL (WEEKDAY(created_at)) DAY, '%Y-%m-%d') AS period_start,
                                SUM(quantity) AS total_quantity
                            FROM coffeebeans
                            GROUP BY coffee_name, supplier_name, period_start
                        ) AS subquery
                        GROUP BY coffee_name, supplier_name
                    ");
                break;

            case 'monthly':
                $this->groupedBeans = $this->beans
                    ->select('coffee_name', 'supplier_name', DB::raw('DATE_FORMAT(created_at, "%Y-%m-01") AS period_start'), DB::raw('SUM(quantity) AS total_quantity'))
                    ->groupBy('coffee_name', 'supplier_name', DB::raw('DATE_FORMAT(created_at, "%Y-%m-01")'))
                    ->orderBy('period_start')
                    ->get();
                break;

            case 'annually':
                $this->groupedBeans = $this->beans
                    ->select(
                        'coffee_name',
                        'supplier_name',
                        DB::raw('YEAR(created_at) AS period_start'),
                        DB::raw('SUM(quantity) AS total_quantity')
                    )
                    ->groupBy('coffee_name', 'supplier_name', DB::raw('YEAR(created_at)'))
                    ->orderBy('period_start')
                    ->get();
                break;
        };
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
