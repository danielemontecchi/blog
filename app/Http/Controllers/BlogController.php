<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Post::whereNotNull('published_at')
			->orderByDesc('published_at')
			->get();

		return view('blog.index', compact('posts'));
	}

	public function show($slug)
	{
		$post = Post::where('slug', $slug)
			->firstOrFail();
		
		return view('blog.show', compact('post'));
	}

}
