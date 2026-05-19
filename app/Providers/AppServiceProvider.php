<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Share website settings with all views
        View::composer('*', function ($view) {
            if (! $view->offsetExists('settings')) {
                try {
                    $view->with('settings', WebsiteSetting::getSettings());
                } catch (\Exception $e) {
                    $view->with('settings', new WebsiteSetting);
                }
            }
        });
    }
}
