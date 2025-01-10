<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\{HasSlug, SlugOptions};
use Storage;
use Str;

class BlogPost extends Model
{
	use HasFactory, HasSlug;

	protected $appends = ['cover_url'];
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

	//*** Scopes ***/

	/**
	 * @param Builder<\App\Models\BlogPost> $query
	 * @return Builder<\App\Models\BlogPost>
	 */
	public function scopePublished(Builder $query): Builder
	{
		return $query->whereNotNull('published_at');
	}

	//*** Mutators ***/

	/** @return Attribute<string, void> */
	protected function coverUrl(): Attribute
	{
		$projectName = config('app.name');
		$initials    = is_string($projectName) && !empty($projectName)
			? Str::initials($projectName)
			: '';

		return Attribute::make(
			get: fn (): string => !empty($this->cover) && Storage::disk('blog')->exists($this->cover)
				? Storage::disk('blog')->url($this->cover)
				: "https://placehold.co/600x400/FFFFFF/000000/png?text=$initials&font=Open+Sans"
		);
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
