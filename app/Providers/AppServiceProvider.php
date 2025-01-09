<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		if ($this->app->isLocal()) {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		Str::macro('initials', function (mixed $text): string {
			$words = preg_split('/\s+/', is_string($text) ? trim($text) : '');
			$words = $words !== false ? $words : [];

			$initials = array_map(fn ($word) => strtoupper($word[0] ?? ''), $words);

			return implode('', $initials);
		});
	}
}
