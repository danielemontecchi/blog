<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
	public string $site_name;
	public ?string $site_description;
	public bool $is_maintenance_mode = false;

	public static function group(): string
	{
		return 'general';
	}
}
