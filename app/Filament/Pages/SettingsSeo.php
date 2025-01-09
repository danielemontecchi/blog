<?php
namespace App\Filament\Pages;

use App\Settings\SeoSetting;
use Filament\Forms\Components\{Section, TagsInput, TextInput, Textarea};
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SettingsSeo extends SettingsPage
{
	protected static string $settings         = SeoSetting::class;
	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'SEO';
	protected static ?string $navigationIcon  = 'heroicon-o-presentation-chart-line';
	protected static ?string $slug            = 'settings/seo';
	protected ?string $heading                = 'SEO settings';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Section::make('Metatag')
					->description('Configuration of the site\'s main metatag.')
					->aside()
					->schema([
						TextInput::make('meta_name')
							->maxLength(70)
							->label('Title'),
						Textarea::make('meta_description')
							->maxLength(160)
							->label('Description'),
						TagsInput::make('meta_keywords')
							->label('Keywords')
							->splitKeys([','])
							->placeholder('Add keywords...')
							->helperText('No more than 10 keyword phrases are suggested.'),
					]),
			]);
	}
}
