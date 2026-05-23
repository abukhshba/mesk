<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\StatsOverview;
use App\Http\Middleware\SetLocale;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->authGuard('admin')
            ->login()
            ->colors([
                'primary' => Color::Green,
                'gray' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                StatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                SetLocale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn () => '
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
                    <style>
                        html[lang="ar"], html[lang="ar"] * {
                            font-family: "Cairo", ui-sans-serif, system-ui, sans-serif !important;
                        }
                    </style>
                ',
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_END,
                function () {
                    $locale = app()->getLocale();
                    $btnUrl = $locale === 'ar' ? e(route('locale.switch', 'en')) : e(route('locale.switch', 'ar'));
                    $btnLabel = $locale === 'ar' ? 'EN' : 'AR';
                    $globe = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="display:inline-block;vertical-align:middle"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10A15.3 15.3 0 0 1 12 2z"/></svg>';
                    $btnClass = 'px-3 py-1 rounded-lg text-sm font-bold transition-colors text-gray-500 hover:bg-gray-100 dark:hover:bg-white/10 dark:hover:text-white';

                    return "
                        <div style='margin-inline-start:12px; margin-inline-end:12px; font-weight: bold'>
                            <button type='button' onclick='setLocale(\"{$btnUrl}\")' class='{$btnClass}' style='display:flex;align-items:center;gap:5px;'>
                                {$globe} {$btnLabel}
                            </button>
                        </div>
                        <script>
                            function setLocale(url){
                                fetch(url,{credentials:'same-origin',headers:{'X-Locale-Switch':'1'}})
                                    .finally(()=>window.location.reload());
                            }
                        </script>";
                },
            );
    }
}
