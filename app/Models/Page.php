<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Page extends Model
{
	use HasFactory, HasSlug;

	protected $guarded = [];
	public $timestamps = false;
	protected $casts   = [
		'is_markdown' => 'boolean',
	];

	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}
}
