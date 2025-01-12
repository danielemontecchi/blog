<?php
namespace Database\Seeders;

use App\Models\{BlogCategory, BlogPost};
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Storage;

class BlogSeeder extends Seeder
{
	public function run(): void
	{
		// clean all files
		$allFiles = Storage::disk('blog')->allFiles();
		Storage::disk('blog')->delete($allFiles);

		Schema::disableForeignKeyConstraints();
		BlogCategory::truncate();
		BlogPost::truncate();
		BlogCategory::factory(rand(5, 10))->create();
		BlogPost::factory(rand(15, 25))->create();
		DB::table('blog_category_blog_post')->truncate();
		Schema::enableForeignKeyConstraints();

		$categories = BlogCategory::all();
		BlogPost::all()->each(function (BlogPost $post) use ($categories) {
			$post->categories()->attach(
				$categories->random(rand(1, 2))->pluck('id')->toArray()
			);
		});
	}
}
