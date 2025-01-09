<?php
namespace App\Filament\Pages;

use App\Settings\ServiceSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SettingsServices extends SettingsPage
{
	protected static string $settings         = ServiceSetting::class;
	protected static ?string $navigationGroup = 'Settings';
	protected static ?string $navigationLabel = 'Services';
	protected static ?string $navigationIcon  = 'heroicon-o-puzzle-piece';
	protected static ?string $slug            = 'settings/services';
	protected ?string $heading                = 'Services integrations';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Section::make('Sentry')
					->description('Connection with the monitoring service sentry.io.')
					->aside()
					->schema([
						TextInput::make('sentry_laravel_dsn')
							->label('Laravel DSN'),
					]),
				Section::make('Google Analytics')
					->description('Implementation of statistics display.')
					->aside()
					->schema([
						TextInput::make('ga_property_id')
							->numeric()
							->label('Property ID'),
						FileUpload::make('ga_service_account_credentials')
							->label('Service Account Credentials')
							->helperText('Upload the service account credentials JSON file.')
							->disk('local')
//							->directory('google_analytics')
							->visibility('private')
							->acceptedFileTypes(['application/json'])
							->getUploadedFileNameForStorageUsing(
								fn (TemporaryUploadedFile $file): string => (string) 'google_analytics/service-account-credentials.json',
							),
					]),
			]);
	}
}
