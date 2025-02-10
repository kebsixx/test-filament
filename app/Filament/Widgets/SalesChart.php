<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Sales Quantity per Month';

    protected function getData(): array
    {
        $sales = Sale::select(
            DB::raw('SUM(quantity) as total_quantity'),
            DB::raw('MONTH(sale_date) as month')
        )
            ->whereYear('sale_date', date('Y'))
            ->groupBy('month')
            ->get();

        $data = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Sales Quantity',
                    'data' => [],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(113, 89, 248)',
                    'borderWidth' => 1,
                ],
            ],
        ];

        foreach ($sales as $sale) {
            $data['labels'][] = date('F', mktime(0, 0, 0, $sale->month, 10));
            $data['datasets'][0]['data'][] = $sale->total_quantity;
        }

        return $data;
    }

    protected function getType(): string
    {
        return 'line';
    }
}
