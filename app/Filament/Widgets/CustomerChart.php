<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CustomerChart extends ChartWidget
{
    protected static ?string $heading = 'Customer in this Month';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $customers = Customer::select(
            DB::raw('COUNT(id) as count'),
            DB::raw('MONTH(created_at) as month')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        $data = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => [],
                    'backgroundColor' => 'rgba(184, 54, 235, 0.2)',
                    'borderColor' => 'rgb(102, 54, 235)',
                    'borderWidth' => 1,
                ],
            ],
        ];

        foreach ($customers as $customer) {
            $data['labels'][] = date('F', mktime(0, 0, 0, $customer->month, 10));
            $data['datasets'][0]['data'][] = $customer->count;
        }

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
