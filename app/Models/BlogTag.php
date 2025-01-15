<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BlogTag extends Model
{
	use HasFactory, HasSlug;

	protected $guarded = [];
	public $timestamps = false;

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('name')
			->saveSlugsTo('slug');
	}

	public function getRouteKeyName(): string
	{
		return 'slug';
	}

	//*** Relationship ***/

	/**
	 * @return BelongsToMany<BlogPost,BlogTag>
	 */
	public function posts(): BelongsToMany
	{
		/** @var BelongsToMany<BlogPost,BlogTag> */
		return $this->belongsToMany(BlogPost::class);
	}
}
