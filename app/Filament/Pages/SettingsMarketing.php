<?php
namespace App\Filament\Pages;

use App\Settings\MarketingSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SettingsMarketing extends SettingsPage
{
	protected static string $settings         = MarketingSetting::class;
	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'Marketing';
	protected static ?string $navigationIcon  = 'heroicon-o-cursor-arrow-ripple';
	protected static ?string $slug            = 'settings/marketing';
	protected ?string $heading                = 'Marketing settings';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Section::make('Google Analytics')
					->description('Site tracking and monitoring codes.')
					->aside()
					->schema([
						TextInput::make('ga_tracking_id')
							->label('Tracking ID'),
					]),
			]);
	}
}
