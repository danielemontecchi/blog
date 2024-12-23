<?php

use App\Models\Post;

it('can create a post', function () {
	$post = Post::create([
		'title' => 'Test Post',
		'slug' => 'test-post',
		'content' => 'This is a test post.',
		'published_at' => now(),
	]);

	expect($post)->toBeInstanceOf(Post::class)
		->and($post->title)->toBe('Test Post');
});
