<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->description('Active: '.Category::active()->count())
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('success'),

            Stat::make('Total Products', Product::count())
                ->description('Featured: '.Product::featured()->count())
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('info'),

            Stat::make('Contact Messages', ContactMessage::count())
                ->description('Unread: '.ContactMessage::unread()->count())
                ->descriptionIcon('heroicon-o-envelope')
                ->color('warning'),
        ];
    }
}
