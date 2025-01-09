<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class BlogPost extends Model
{
	use HasFactory, HasSlug;

	protected $guarded = [];
	public $timestamps = true;
	protected $casts   = [
		'published_at' => 'datetime',
	];

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}

	public function getRouteKeyName(): string
	{
		return 'slug';
	}

	//*** Relationship ***/

	/**
	 * @return BelongsToMany<BlogCategory, BlogPost>
	 */
	public function categories(): BelongsToMany
	{
		/** @var BelongsToMany<BlogCategory, BlogPost> */
		return $this->belongsToMany(BlogCategory::class);
	}
}
