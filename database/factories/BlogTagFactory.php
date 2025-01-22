<?php
namespace Database\Factories;

use App\Models\BlogTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BlogTag>
 */
class BlogTagFactory extends Factory
{
	/**
	 * @var class-string<BlogTag>
	 */
	protected $model = BlogTag::class;

	/**
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name'  => fake()->words(rand(1, 3), true),
			'views' => rand(50, 100),
		];
	}
}
