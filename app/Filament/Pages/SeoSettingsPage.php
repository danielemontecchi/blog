<?php
namespace App\Filament\Pages;

use App\Settings\SeoSetting;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SeoSettingsPage extends Page implements Forms\Contracts\HasForms
{
	use Forms\Concerns\InteractsWithForms;

	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'SEO';
	protected static ?string $navigationIcon  = 'heroicon-o-presentation-chart-line';
	protected static ?string $slug            = 'settings/seo';
	protected ?string $heading                = 'SEO settings';
	protected static string $view             = 'filament.pages.seo-settings-page';

	/**
	 * @var array<mixed>
	 */
	public array $settings = [];

	public function mount(): void
	{
		$this->settings = app(SeoSetting::class)->toArray();
	}

	public function save(): void
	{
		$settings = app(SeoSetting::class);
		foreach ($this->settings as $key => $value) {
			$settings->$key = $value;
		}
		$settings->save();

		Notification::make()
			->title('Settings successfully saved!')
			->success()
			->send();
	}
}
