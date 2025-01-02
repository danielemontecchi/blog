<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
	public function up(): void
	{
		$this->migrator->add('seo.meta_name', config('app.name'));
		$this->migrator->add('seo.meta_description', null);
		$this->migrator->add('seo.ga_id', null);
	}
};
