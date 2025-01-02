<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\{HasSlug, SlugOptions};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Page>
 */
class Page extends BaseModel
{
	use HasFactory, HasSlug;

	public $timestamps = false;

	protected function casts(): array
	{
		return [
			'is_markdown' => 'boolean',
		];
	}

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}
}
