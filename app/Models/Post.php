<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\{HasSlug, SlugOptions};

/**
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 *
 * @mixin Builder<Post>
 */
class Post extends BaseModel
{
	use HasFactory, HasSlug;

	protected function casts(): array
	{
		return [
			'published_at' => 'datetime',
		];
	}

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}
}
