<?php

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can display the blog index', function () {
	$this->get(route('blog.index'))
		->assertStatus(200);
});

it('can display a blog post', function () {
	$post = BlogPost::factory()->create([
		'title'        => 'Post for testing',
		'published_at' => now(),
	]);

	$this->get(route('blog.show', $post->slug))
		->assertStatus(200)
		->assertSee($post->title);
});
