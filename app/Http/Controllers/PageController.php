<?php
namespace App\Http\Controllers;

use App\Models\{BlogCategory, BlogPost, Page};
use Illuminate\View\View;

class PageController extends Controller
{
	public function home(): View
	{
		$posts = BlogPost::published()
			->latest('published_at')
			->take(6)
			->get();

		$features = BlogCategory::where('home_feature_visible', true)
			->orderBy('home_feature_order')
			->get();

		return view('pages.home', compact('posts', 'features'));
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
