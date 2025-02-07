<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::truncate();

		$fullDomain = request()->getHost();
		$parts = explode('.', $fullDomain);
		$baseDomain = $fullDomain;
		if (count($parts) >= 2) {
			$baseDomain = implode('.', array_slice($parts, -2));
		}

		// create default user
		User::factory()->create([
			'name' => 'Admin User',
			'email' => 'admin@user.me',
			'password' => bcrypt('admin1234'),
		]);
		User::factory()->create([
			'name' => 'Admin Domain User',
			'email' => 'admin@' . $baseDomain,
			'password' => bcrypt('admin1234'),
		]);
	}
}
