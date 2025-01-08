<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\GoogleAnalyticsVisitorsWidget;
use Filament\{Pages, Panel, PanelProvider, Widgets};
use Filament\Facades\Filament as FFilament;
use Filament\Http\Middleware\{Authenticate,
	AuthenticateSession,
	DisableBladeIconComponents,
	DispatchServingFilamentEvent};
use Filament\Navigation\{NavigationGroup, NavigationItem};
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\{AddQueuedCookiesToResponse, EncryptCookies};
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
	public function boot(): void
	{
		FFilament::serving(function () {
			FFilament::registerNavigationGroups([
				NavigationGroup::make('Tools')
					->collapsible(),
			]);

			FFilament::registerNavigationItems([
				NavigationItem::make('Horizon')
					->url(route('horizon.index'))
					->icon('heroicon-o-queue-list')
					->group('Tools')
					->sort(1)
					->openUrlInNewTab(),
				NavigationItem::make('Logs')
					->url(route('log-viewer.index'))
					->icon('heroicon-o-document-text')
					->group('Tools')
					->sort(2)
					->openUrlInNewTab(),
			]);
		});

		FFilament::serving(function () {
			FFilament::registerWidgets([
				GoogleAnalyticsVisitorsWidget::class,
			]);
		});
	}

	public function panel(Panel $panel): Panel
	{
		return $panel
			->default()
			->id('admin')
			->path('admin')
			->login()
			->colors([
				'primary' => Color::Green,
			])
			->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
			->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
			->pages([
				Pages\Dashboard::class,
			])
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
			->navigationGroups([
				'Blog',
				'Settings',
			]);
	}
}
