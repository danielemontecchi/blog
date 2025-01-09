<?php
namespace App\Filament\Pages;

use App\Settings\GeneralSetting;
use Filament\Forms\Components\{Section, TextInput, Textarea, Toggle};
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SettingsGeneral extends SettingsPage
{
	protected static string $settings         = GeneralSetting::class;
	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'General';
	protected static ?string $navigationIcon  = 'heroicon-o-globe-alt';
	protected static ?string $slug            = 'settings/general';
	protected ?string $heading                = 'General settings';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Section::make('Site')
					->description('Main information and basic settings of your site.')
					->aside()
					->schema([
						TextInput::make('site_name'),
						Textarea::make('site_description')
							->rows(5),
					]),
				Section::make('Mode')
					->description('Operating modes of site.')
					->aside()
					->schema([
						Toggle::make('is_maintenance_mode')
							->onColor('danger')
							->offColor('gray'),
					]),
			]);
	}
}
