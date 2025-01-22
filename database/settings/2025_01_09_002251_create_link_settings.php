<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
	public function up(): void
	{
		$this->migrator->add('link.github', null);
		$this->migrator->add('link.linkedin', null);
		$this->migrator->add('link.x', null);
	}
};
