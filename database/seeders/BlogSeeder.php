<?php
namespace Database\Seeders;

use App\Models\{BlogCategory, BlogPost};
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Storage;

class BlogSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Schema::disableForeignKeyConstraints();
		BlogCategory::truncate();
		BlogCategory::factory(5)->create();
		BlogPost::truncate();
		BlogPost::factory(10)->create();
		DB::table('blog_category_blog_post')->truncate();
		Schema::enableForeignKeyConstraints();

		// clean all files
		$allFiles = Storage::disk('blog')->allFiles();
		Storage::disk('blog')->delete($allFiles);

		$categories = BlogCategory::all();
		BlogPost::all()->each(function (BlogPost $post) use ($categories) {
			$post->categories()->attach(
				$categories->random(rand(1, 3))->pluck('id')->toArray()
			);
		});
	}
}
