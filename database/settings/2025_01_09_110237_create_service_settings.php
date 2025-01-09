<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
	public function up(): void
	{
		$this->migrator->add('services.sentry_laravel_dsn', '');
		$this->migrator->add('services.ga_property_id', null);
		$this->migrator->add('services.ga_service_account_credentials', null);
	}
};
