<?php
namespace Database\Seeders;

use App\Models\{BlogCategory, BlogPost, BlogTag};
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
		BlogTag::truncate();
		BlogCategory::factory(rand(5, 10))->create();
		BlogTag::factory(rand(20, 30))->create();
		BlogPost::factory(rand(20, 30))->create();
		DB::table('blog_category_blog_post')->truncate();
		DB::table('blog_post_blog_tag')->truncate();
		Schema::enableForeignKeyConstraints();

		$categories = BlogCategory::all();
		$tags       = BlogTag::all();
		BlogPost::all()->each(function (BlogPost $post) use ($categories, $tags) {
			$post->categories()->attach(
				$categories
					->random(rand(1, 2))
					->pluck('id')
					->toArray()
			);
			$post->tags()->attach(
				$tags
					->random(rand(3, 5))
					->pluck('id')
					->toArray()
			);
		});
	}
}
