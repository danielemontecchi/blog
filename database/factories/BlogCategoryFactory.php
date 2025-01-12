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
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name'                     => $this->faker->unique()->words(2, true),
			'slug'                     => $this->faker->unique()->slug,
			'icon'                     => $this->faker->randomElement(['academic-cap', 'arrow-down-on-square-stack', 'beaker', 'circle-stack', 'fire', 'identification', 'sparkles']),
			'home_feature_visible'     => $this->faker->boolean,
			'home_feature_order'       => $this->faker->numberBetween(1, 10),
			'home_feature_title'       => $this->faker->words(3, true),
			'home_feature_description' => Str::limit($this->faker->paragraph, 100),
		];
	}
}
