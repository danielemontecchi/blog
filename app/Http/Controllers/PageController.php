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

		$features = BlogCategory::where('is_featured', true)
			->orderBy('order')
			->get();

		return view('pages.index', compact('posts', 'features'));
	}
}
