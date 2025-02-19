<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;

use Filament\Widgets\AccountWidget;
use Filament\Navigation\NavigationItem;
use App\Filament\Resources\GuruResource;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationGroup;
// use App\Filament\Resources\JadBelResource;
use Filament\Widgets\FilamentInfoWidget;
use App\Filament\Resources\KelasResource;
use App\Filament\Resources\JadBelResource;
use App\Filament\Resources\SantriResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Resources\PekerjaanResource;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource; // Ensure this class exists in the specified path
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\PeriodeResource; // Ensure this class exists in the specified path

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarCollapsibleOnDesktop(true)
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->emailVerification()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
            ])
            // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            //     return $builder->groups([
            //         NavigationGroup::make()
            //             ->items([
            //                 NavigationItem::make('Dashboard')
            //                 ->icon('heroicon-o-home')
            //                 ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
            //                 ->url(fn (): string => Dashboard::getUrl()),
            //             ]),
            //         NavigationGroup::make('Academic')
            //             ->items([
            //                 ...SantriResource::getNavigationItems(),
            //                 ...GuruResource::getNavigationItems(),
            //                 ...KelasResource::getNavigationItems(),
            //                 ...JadBelResource::getNavigationItems(),
            //             ]),
            //         NavigationGroup::make('Konfirgurasi')
            //             ->items([
            //                 ...PekerjaanResource::getNavigationItems(),
            //                 ...PeriodeResource::getNavigationItems(),
            //             ]),
            //         NavigationGroup::make('Setting')
            //             ->items([
            //                 ...UserResource::getNavigationItems(),
            //                 NavigationItem::make('Roles') // Tambahkan Role secara manual
            //                     ->icon('heroicon-o-shield-check')
            //                     ->url(route('filament.admin.resources.shield.roles.index')) // URL ke halaman role
            //                     ->isActiveWhen(fn (): bool => request()->routeIs('filament.resources.roles.*')), // Aktifkan ketika berada di halaman Role
            //             ]),
            //     ]);
            // })
            ->databaseNotifications();
    }
}
