<?php
namespace App\Http\Controllers;

use App\Models\{BlogCategory, BlogPost};
use Cache;
use Illuminate\View\View;

class BlogController extends Controller
{
	public function index(): View
	{
		$posts = BlogPost::published()
			->latest('published_at')
			->paginate(9);

		$this->loadCategories();

		$breadcrumbs = [
			[
				'text' => 'Articles',
				'link' => '',
			],
		];

		return view('blog.index', compact('posts', 'breadcrumbs'));
	}

	public function category(string $slug): View
	{
		$category = BlogCategory::where('slug', $slug)->firstOrFail();
		$posts    = $category->posts()->published()->paginate(9);

		$this->loadCategories();

		$breadcrumbs = [
			[
				'text' => 'Category',
				'link' => '',
			],
			[
				'text' => $category->name,
				'link' => '',
			],
		];

		return view('blog.index', compact('posts', 'category', 'breadcrumbs'));
	}

	private function loadCategories(): void
	{
		$categories = Cache::remember(
			'blog_categories',
			now()->addDay(),
			fn () => BlogCategory::withCount('posts')
				->orderBy('name')
				->get()
		);

		view()->share(compact('categories'));
	}

	public function show(string $slug): View
	{
		$post = BlogPost::where('slug', $slug)
			->firstOrFail();
		$post->increment('views');

		$breadcrumbs = [
			[
				'text' => 'Articles',
				'link' => route('blog.index'),
			],
			[
				'text' => $post->title,
				'link' => '',
			],
		];

		return view('blog.show', compact('post', 'breadcrumbs'));
	}
}
