<?php

namespace App\Http\Controllers;

use App\Models\{BlogCategory, BlogPost, Page};
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
	public function home(): View
	{
		$postsLatest = Cache::remember(
			'posts_latest',
			60 * 12,
			fn() => BlogPost::published()
				->latest('published_at')
				->take(6)
				->get()
		);

		$postsPopular = Cache::remember(
			'posts_popular',
			60 * 12,
			fn() => BlogPost::published()
				->latest('views')
				->take(6)
				->get()
		);

		$features = BlogCategory::where('is_featured', true)
			->orderBy('order')
			->get();

		return view('pages.index', compact('postsLatest', 'postsPopular', 'features'));
	}
}
