<?php

use App\Models\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can display the category page', function () {
	$category = BlogCategory::factory()->create([
		'name' => 'Category for testing',
	]);

	$this->get(route('blog.category', $category))
		->assertStatus(200)
		->assertSee($category->name);
});
