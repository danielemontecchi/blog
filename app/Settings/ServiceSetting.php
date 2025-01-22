<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ServiceSetting extends Settings
{
	public ?string $sentry_laravel_dsn;
	public ?string $ga_property_id;
	public ?string $ga_service_account_credentials;

	public static function group(): string
	{
		return 'services';
	}
}
