<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var class-string<Page>
	 */
	protected $model = Page::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title' => $this->faker->sentence,
			'slug' => $this->faker->slug,
			'content' => $this->faker->paragraphs(3, true),
			'is_markdown' => $this->faker->boolean,
		];
	}
}
