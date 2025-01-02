<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		User::truncate();

		// Creare un utente specifico
		User::factory()->create([
			'name'     => 'Admin User',
			'email'    => 'admin@user.me',
			'password' => bcrypt('admin1234'),
		]);

		// Creare 3 utenti casuali
		User::factory()->count(3)->create();
	}
}
