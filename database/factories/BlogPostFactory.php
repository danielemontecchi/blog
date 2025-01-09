<?php
namespace Database\Factories;

use App\Models\BlogPost;
use Http;
use Illuminate\Database\Eloquent\Factories\Factory;
use Storage;

/**
 * @extends Factory<BlogPost>
 */
class BlogPostFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var class-string<BlogPost>
	 */
	protected $model = BlogPost::class;

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
			'intro'        => $this->faker->text(190),
			'content'      => $this->faker->paragraphs(3, true),
			'cover'        => $this->generateImage(),
			'views'        => $this->faker->numberBetween(0, 1000),
			'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
		];
	}

	private function generateImage(): string
	{
		$url      = 'https://placehold.co/600x400/jpg?text=' . $this->faker->slug;
		$fileName = 'blog/' . rand(1, 100) . '-' . $this->faker->slug . '.jpg';

		// Download image
		$imageContent = Http::get($url)->body();
		Storage::disk('public')->put($fileName, $imageContent);

		return $fileName;
	}
}
