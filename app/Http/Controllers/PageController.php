<?php
namespace App\Http\Controllers;

use App\Models\{Page, Post};
use Illuminate\View\View;

class PageController extends Controller
{
	public function home(): View
	{
		$posts = Post::whereNotNull('published_at')
			->orderByDesc('published_at')
			->take(9)
			->get();

		return view('pages.home', compact('posts'));
	}

	public function page(string $slug): View
	{
		$page = Page::where('slug', $slug)->first();
		if ($page) {
			return view('pages.page', compact('page'));
		}

		abort(404);
	}
}
