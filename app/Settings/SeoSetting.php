<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSetting extends Settings
{
	public string $meta_name;
	public ?string $meta_description;
	public ?string $ga_id;

	public static function group(): string
	{
		return 'seo';
	}
}
