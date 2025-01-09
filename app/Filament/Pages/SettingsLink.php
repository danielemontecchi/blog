<?php
namespace App\Filament\Pages;

use App\Settings\LinkSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SettingsLink extends SettingsPage
{
	protected static string $settings         = LinkSetting::class;
	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'Links';
	protected static ?string $navigationIcon  = 'heroicon-o-link';
	protected static ?string $slug            = 'settings/links';
	protected ?string $heading                = 'Links settings';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Section::make('Social Username')
					->description('Indicate which of your social media usernames the site manages.')
					->aside()
					->schema([
						TextInput::make('github')
							->maxLength(100)
							->prefix('@')
							->label('Github'),
						TextInput::make('linkedin')
							->maxLength(100)
							->prefix('@')
							->label('LinkedIn'),
						TextInput::make('x')
							->maxLength(100)
							->prefix('@')
							->label('X')
							->helperText('aka Twitter.'),
					]),
			]);
	}
}
