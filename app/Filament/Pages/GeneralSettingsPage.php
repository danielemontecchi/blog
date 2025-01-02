<?php
namespace App\Filament\Pages;

use App\Settings\GeneralSetting;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class GeneralSettingsPage extends Page implements Forms\Contracts\HasForms
{
	use Forms\Concerns\InteractsWithForms;

	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'General';
	protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
	protected static ?string $slug            = 'settings/general';
	protected ?string $heading                = 'General settings';
	protected static string $view             = 'filament.pages.general-settings-page';
	public array $settings                    = [];

	public function mount(): void
	{
		$this->settings = app(GeneralSetting::class)->toArray();
		ray($this->settings);
	}

	public function form(Forms\Form $form): Forms\Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('general.site_name')
					->label('Site name')
					->required(),
				Forms\Components\Textarea::make('general.site_description')
					->label('Site description')
					->rows(4),
				Forms\Components\Toggle::make('general.is_maintenance_mode')
					->label('Maintenance mode'),
			]);
	}

	public function save(): void
	{
		$settings = app(GeneralSetting::class);
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
