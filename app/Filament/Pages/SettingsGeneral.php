<?php
namespace App\Filament\Pages;

use App\Repositories\FilamentRepository;
use App\Settings\GeneralSetting;
use BladeUIKit\Components\Support\Avatar;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\{Section, TextInput, Toggle};
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Str;

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
		ray((new Avatar('')));

		return $form
			->schema([
				Section::make('Site')
					->description('Main information and basic settings.')
					->aside()
					->schema([
						TextInput::make('site_name')
							->label('Name')
							->required(),
						TextInput::make('site_email')
							->email()
							->label('Email'),
						Select::make('site_avatar_provider')
							->label('Avatar Provider')
							->options([
								'all'        => 'All',
								'adorable'   => 'Adorable',
								'dicebear'   => 'Dicebear',
								'gravatar'   => 'Gravatar',
								'robohash'   => 'Robohash',
								'robothash'  => 'Robothash',
								'ui-avatars' => 'Ui Avatars',
							])
							->default('all')
							->required()
							->selectablePlaceholder(false)
							->helperText('Choose the provider to be used to retrieve users\' avatar images.'),
					]),
				Section::make('Admin Panel')
					->description('Some options for the administration panel.')
					->aside()
					->schema([
						TextInput::make('admin_path')
							->prefix(Str::finish(is_string(config('app.url')) ? config('app.url') : '', '/'))
							->label('Path Url')
							->default('admin')
							->required()
							->helperText('The path to the admin panel.'),
						Select::make('admin_color')
							->label('Base Color')
							->options(app(FilamentRepository::class)->getColors())
							->default('green')
							->required()
							->selectablePlaceholder(false)
							->helperText('The base color of the admin panel.'),
					]),
				Section::make('Mode')
					->description('Operating modes of site.')
					->aside()
					->schema([
						Toggle::make('mode_maintenance')
							->label('Maintenance mode')
							->onColor('danger')
							->offColor('gray'),
					]),
			]);
	}
}
