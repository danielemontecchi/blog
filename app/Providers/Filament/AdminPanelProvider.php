<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\GoogleAnalyticsVisitorsWidget;
use App\Settings\GeneralSetting;
use Filament\{Panel, PanelProvider, Widgets};
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
use Schema;
use Str;

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
		$adminPath = 'admin';
		$adminColorText = 'green';
		if (Schema::hasTable('settings')) {
			try {
				$generalSettings = app(GeneralSetting::class);
				$adminPath = $generalSettings->admin_path
					?? 'admin';
				$adminColorText = isset($generalSettings->admin_color)
					? Str::lower($generalSettings->admin_color)
					: 'green';
			} catch (\Throwable $e) {
				// do nothing
			}
		}

		return $panel
			->id('admin')
			->path($adminPath)
			->login()
			->default()
			->colors([
				'primary' => Color::all()[$adminColorText],
			])
			->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
			->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
			->pages([
				Dashboard::class,
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
