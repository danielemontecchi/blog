<?php
namespace App\Http\Controllers;

use App\Models\{BlogCategory, BlogPost};
use Illuminate\View\View;

class BlogController extends Controller
{
	public function index(): View
	{
		$posts = BlogPost::with('categories')
			->published()
			->latest('published_at')
			->paginate(9);

		$categories = BlogCategory::orderBy('name')->get();

		return view('blog.index', compact('posts', 'categories'));
	}

	public function show(string $slug): View
	{
		$post = BlogPost::where('slug', $slug)
			->firstOrFail();
		$post->increment('views');

		return view('blog.show', compact('post'));
	}
}
