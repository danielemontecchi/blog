<?php

use App\Models\{BlogCategory, BlogPost, BlogTag};
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a post', function () {
	$testTitle = 'Post for testing';

	$post = BlogPost::factory()->create([
		'title' => $testTitle,
	]);
	$post->categories()->attach(
		BlogCategory::all()->random(rand(1, 3))->pluck('id')->toArray()
	);
	$post->tags()->attach(
		BlogTag::all()->random(rand(1, 3))->pluck('id')->toArray()
	);

	$this->get(route('blog.show', ['slug' => $post->slug]))
		->assertStatus(200)
		->assertSeeText($testTitle);
});
