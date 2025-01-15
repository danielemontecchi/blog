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
	 * @var class-string<Page>
	 */
	protected $model = Page::class;

	/**
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title'       => $this->faker->sentence,
			'content'     => $this->faker->paragraphs(3, true),
			'is_markdown' => $this->faker->boolean,
		];
	}
}
