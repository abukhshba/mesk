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
            Stat::make(__('app.total_categories'), Category::count())
                ->description(__('app.active') . ': ' . Category::active()->count())
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('success'),

            Stat::make(__('app.total_products'), Product::count())
                ->description(__('app.featured') . ': ' . Product::featured()->count())
                ->descriptionIcon('heroicon-o-archive-box')
                ->color('info'),

            Stat::make(__('app.contact_messages'), ContactMessage::count())
                ->description(__('app.unread') . ': ' . ContactMessage::unread()->count())
                ->descriptionIcon('heroicon-o-envelope')
                ->color('warning'),
        ];
    }
}
