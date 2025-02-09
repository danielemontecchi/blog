<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
	protected $with    = ['categories', 'author'];
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
				: "https://placehold.co/600x400/d1d5db/4b5563/png?font=open-sans&text=$initials"
		);
	}

	//*** Relationship ***/

	/**
	 * @return BelongsTo<User, BlogPost>
	 */
	public function author(): BelongsTo
	{
		/** @var BelongsTo<User, BlogPost> */
		return $this->belongsTo(User::class, 'author_id');
	}

	/**
	 * @return BelongsToMany<BlogCategory, BlogPost>
	 */
	public function categories(): BelongsToMany
	{
		/** @var BelongsToMany<BlogCategory, BlogPost> */
		return $this->belongsToMany(BlogCategory::class);
	}

	/**
	 * @return BelongsToMany<BlogTag, BlogPost>
	 */
	public function tags(): BelongsToMany
	{
		/** @var BelongsToMany<BlogTag, BlogPost> */
		return $this->belongsToMany(BlogTag::class, 'blog_post_blog_tag', 'blog_post_id', 'blog_tag_id');
	}
}
