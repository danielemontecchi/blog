<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class BlogCategory extends Model
{
	use HasFactory, HasSlug;

	protected $guarded = [];
	public $timestamps = false;
	protected $casts   = [
		'home_feature_visible' => 'boolean',
		'home_feature_order'   => 'integer',
	];

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}

	//*** Relationship ***/

	/**
	 * @return BelongsToMany<BlogPost, BlogCategory>
	 */
	public function posts(): BelongsToMany
	{
		/** @var BelongsToMany<BlogPost, BlogCategory> */
		return $this->belongsToMany(BlogPost::class);
	}
}
