<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};
use Spatie\Sluggable\{HasSlug, SlugOptions};

/**
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @mixin Builder<Post>
 */
class Post extends Model
{
	use HasFactory, HasSlug;

	protected $guarded = [];

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}
}
