<?php
namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	protected function setUp(): void
	{
		parent::setUp();

		// Create database if not exists
		$databasePath = base_path('database/testing.sqlite');
		if (!file_exists($databasePath)) {
			touch($databasePath);
		}

		// migrate and seed the database
		\Artisan::call('migrate', [
			'--env'  => 'testing',
			'--seed' => true,
		]);
	}
}
