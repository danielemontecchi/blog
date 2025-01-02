<?php
namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var class-string<Post>
	 */
	protected $model = Post::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title'        => $this->faker->sentence,
			'slug'         => $this->faker->slug,
			'content'      => $this->faker->paragraphs(3, true),
			'views'        => $this->faker->numberBetween(0, 1000),
			'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
		];
	}
}
