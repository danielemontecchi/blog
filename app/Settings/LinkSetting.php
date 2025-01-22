<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LinkSetting extends Settings
{
	public ?string $github;
	public ?string $linkedin;
	public ?string $x;

	public static function group(): string
	{
		return 'link';
	}
}
