<?php
namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends Factory<BlogCategory>
 */
class BlogCategoryFactory extends Factory
{
	/**
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name'        => $this->faker->unique()->words(rand(1, 3), true),
			'icon'        => $this->faker->randomElement(['academic-cap', 'arrow-down-on-square-stack', 'beaker', 'circle-stack', 'fire', 'identification', 'sparkles']),
			'is_featured' => $this->faker->boolean,
			'order'       => $this->faker->numberBetween(1, 10),
			'title'       => $this->faker->words(3, true),
			'description' => Str::limit($this->faker->paragraph, 100),
		];
	}
}
