<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
	public string $site_name;
	public ?string $site_email;
	public string $site_avatar_provider = 'gravatar';
	public string $admin_path           = 'admin';
	public string $admin_color          = 'green';
	public bool $mode_maintenance       = false;

	public static function group(): string
	{
		return 'general';
	}
}
