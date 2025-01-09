<?php
namespace App\Providers;

use App\Settings\LinkSetting;
use App\Settings\MarketingSetting;
use App\Settings\SeoSetting;
use App\Settings\ServiceSetting;
use Artesaos\SEOTools\Facades\TwitterCard;
use Config;
use File;
use Illuminate\Support\ServiceProvider;
use Sentry\ClientBuilder;
use Sentry\SentrySdk;
use Sentry\State\Hub;

class LoadSettingsServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 */
	public function register(): void
	{
		//
	}

	public function boot(): void
	{
		if (!app()->runningInConsole() && !app()->runningUnitTests()) {
			$this->marketing();
			$this->seo();
			$this->service();
		}
	}

	private function marketing(): void
	{
		$settings = app(MarketingSetting::class);

		Config::set('services.google.analytics_tracking_id', $settings->ga_tracking_id);
	}

	private function seo(): void
	{
		$settings = app(SeoSetting::class);

		// meta
		Config::set('seotools.meta.defaults.title', $settings->meta_name);
		Config::set('seotools.meta.defaults.description', $settings->meta_description);
		Config::set('seotools.meta.defaults.keywords', $settings->meta_keywords);

		// opengraph
		Config::set('opengraph.meta.defaults.title', $settings->meta_name);
		Config::set('opengraph.meta.defaults.description', $settings->meta_description);
		Config::set('opengraph.meta.defaults.site_name', config('site.name'));

		// twitter
		TwitterCard::setTitle(is_string(config('site.name')) ? config('site.name') : '');
		TwitterCard::setSite('@' . app(LinkSetting::class)->x);

		// json-ld
		Config::set('json-ld.meta.defaults.title', $settings->meta_name);
		Config::set('json-ld.meta.defaults.description', $settings->meta_description);
	}

	private function service(): void
	{
		$settings                        = app(ServiceSetting::class);
		$gaServiceAccountCredentialsJson = null;
		$gaFileJson                      = base_path('storage/app/private/' . app(ServiceSetting::class)->ga_service_account_credentials);
		if (!empty(app(ServiceSetting::class)->ga_service_account_credentials) && File::exists($gaFileJson)) {
			$gaServiceAccountCredentialsJson = $gaFileJson;
		}

		Config::set('sentry.dsn', $settings->sentry_laravel_dsn);
		// reload Sentry
		SentrySdk::setCurrentHub(new Hub(
			ClientBuilder::create(['dsn' => config('sentry.dsn')])->getClient()
		));

		Config::set('services.google.analytics_property_id', $settings->ga_property_id);
		Config::set('services.google.analytics_service_account_credentials', $gaServiceAccountCredentialsJson);
		Config::set('analytics.property_id', $settings->ga_property_id);
		Config::set('analytics.service_account_credentials_json', $gaServiceAccountCredentialsJson);
	}
}
