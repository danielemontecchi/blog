<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
	public function up(): void
	{
		$this->migrator->add('seo.meta_name', config('app.name'));
		$this->migrator->add('seo.meta_description', null);
		$this->migrator->add('seo.meta_keywords', []);
		$this->migrator->add('seo.ga_api_key', null);
		$this->migrator->add('seo.ga_property_id', null);
		$this->migrator->add('seo.ga_service_account_credentials', null);
	}
};
