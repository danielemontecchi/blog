<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
	public function index(): View
	{
		$posts = Post::whereNotNull('published_at')
			->orderByDesc('published_at')
			->get();

		return view('blog.index', compact('posts'));
	}

	public function show(string $slug): View
	{
		$post = Post::where('slug', $slug)
			->firstOrFail();
		$post->increment('views');

		return view('blog.show', compact('post'));
	}
}
