<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
	public function up(): void
	{
		$this->migrator->add('general.site_name', config('app.name'));
		$this->migrator->add('general.site_email', config('mail.from.address'));
		$this->migrator->add('general.site_avatar_provider', 'gravatar');
		$this->migrator->add('general.admin_path', 'admin');
		$this->migrator->add('general.admin_color', 'green');
		$this->migrator->add('general.mode_maintenance', false);
	}
};
