<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a post', function () {
	$testTitle = 'Post for testing';

	$post = Post::factory()->create([
		'title' => $testTitle,
	]);

	$this->assertDatabaseHas('posts', ['title' => $testTitle]);
});
