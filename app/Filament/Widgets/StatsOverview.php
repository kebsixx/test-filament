<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '3s';

    protected function getStats(): array
    {
        $productCount = Product::count();
        $customerCount = Customer::count();
        $saleCount = Sale::count();

        return [
            Stat::make('Total Products', $productCount)
                ->description('Total number of products')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
            Stat::make('Total Customers', $customerCount)
                ->description('Total number of customers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            Stat::make('Total Sales', $saleCount)
                ->description('Total number of sales')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),
        ];
    }
}
