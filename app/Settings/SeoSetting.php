<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSetting extends Settings
{
	public string $meta_name;
	public ?string $meta_description;
	public ?string $ga_tracking_id;
	public ?string $ga_property_id;
	public ?string $ga_service_account_credentials;

	public static function group(): string
	{
		return 'seo';
	}
}
