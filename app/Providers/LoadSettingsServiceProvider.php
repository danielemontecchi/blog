<?php
namespace App\Providers;

use App\Settings\LinkSetting;
use App\Settings\SeoSetting;
use Artesaos\SEOTools\Facades\TwitterCard;
use Config;
use File;
use Illuminate\Support\ServiceProvider;

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
		$this->analytics();
		$this->seotools();
	}

	private function analytics(): void
	{
		$gaServiceAccountCredentialsJson = null;
		$gaFileJson                      = base_path('storage/app/private/' . app(SeoSetting::class)->ga_service_account_credentials);
		if (!empty(app(SeoSetting::class)->ga_service_account_credentials) && File::exists($gaFileJson)) {
			$gaServiceAccountCredentialsJson = $gaFileJson;
		}
		$seoSettings = app(SeoSetting::class);

		Config::set('services.google.analytics_tracking_id', $seoSettings->ga_tracking_id);
		Config::set('services.google.analytics_property_id', $seoSettings->ga_property_id);
		Config::set('services.google.analytics_service_account_credentials', $gaServiceAccountCredentialsJson);
	}

	private function seotools(): void
	{
		$seoSettings = app(SeoSetting::class);

		// meta
		Config::set('seotools.meta.defaults.title', $seoSettings->meta_name);
		Config::set('seotools.meta.defaults.description', $seoSettings->meta_description);
		Config::set('seotools.meta.defaults.keywords', $seoSettings->meta_keywords);

		// opengraph
		Config::set('opengraph.meta.defaults.title', $seoSettings->meta_name);
		Config::set('opengraph.meta.defaults.description', $seoSettings->meta_description);
		Config::set('opengraph.meta.defaults.site_name', config('site.name'));

		// twitter
		TwitterCard::setTitle(is_string(config('site.name')) ? config('site.name') : '');
		TwitterCard::setSite('@' . app(LinkSetting::class)->x);

		// json-ld
		Config::set('json-ld.meta.defaults.title', $seoSettings->meta_name);
		Config::set('json-ld.meta.defaults.description', $seoSettings->meta_description);
	}
}
