<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MarketingSetting extends Settings
{
	public ?string $ga_tracking_id;

	public static function group(): string
	{
		return 'marketing';
	}
}
