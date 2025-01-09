<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSetting extends Settings
{
	public string $meta_name;
	public ?string $meta_description;

	/**
	 * @var string[]
	 */
	public ?array $meta_keywords;

	public static function group(): string
	{
		return 'seo';
	}
}
