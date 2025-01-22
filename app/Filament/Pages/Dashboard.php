<?php
namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
	protected static ?string $title = null;

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		/** @var string $projectName */
		$projectName = config('app.name');
		/** @var string $projectVersion */
		$projectVersion = config('app.version');

		return "$projectName (v$projectVersion)";
	}

	public static function getNavigationLabel(): string
	{
		return 'Dashboard';
	}
}
