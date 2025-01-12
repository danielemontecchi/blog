<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		Schema::disableForeignKeyConstraints();
		$this->call([
			UserSeeder::class,
			PageSeeder::class,
			BlogSeeder::class,
		]);
		Schema::enableForeignKeyConstraints();
	}
}
