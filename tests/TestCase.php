<?php
namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\File;

abstract class TestCase extends BaseTestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		// Create database if not exists
		$databasePath = database_path('testing.sqlite');
		if (!File::exists($databasePath)) {
			File::put($databasePath, '');
		}

		// migrate and seed the database
		\Artisan::call('migrate', [
			'--env'  => 'testing',
			'--seed' => true,
		]);
	}
}
