<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::truncate();

		// create default user
		User::factory()->create([
			'name'     => 'Admin User',
			'email'    => 'admin@user.me',
			'password' => bcrypt('admin1234'),
		]);

		User::factory()->count(5)->create();
	}
}
