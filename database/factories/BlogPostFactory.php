<?php
namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\User;
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
		$user      = User::inRandomOrder()->first();
		$author_id = $user?->id;

		return [
			'author_id'    => $author_id,
			'title'        => $this->faker->sentence,
			'slug'         => $this->faker->slug,
			'intro'        => $this->faker->text(190),
			'content'      => $this->faker->paragraphs(3, true),
			'cover'        => $this->generateImage($author_id),
			'views'        => $this->faker->numberBetween(0, 1000),
			'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
		];
	}

	private function generateImage(int|null $id): string
	{
		if (empty($id)) {
			$id = rand(1, 100);
		}
		$ext      = 'png';
		$url      = 'https://placehold.co/600x400/d1d5db/4b5563/' . $ext . '?font=open-sans&text=' . $id;
		$fileName = $id . '-' . $this->faker->slug . '.' . $ext;

		// Download image
		$imageContent = Http::get($url)->body();
		Storage::disk('blog')->put($fileName, $imageContent);

		return $fileName;
	}
}
