<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PageController extends Controller
{
	public function home(): View
	{
		$posts = Post::whereNotNull('published_at')
			->orderByDesc('published_at')
			->take(6)
			->get();

		return view('pages.home', compact('posts'));
	}

	public function about(): View
	{
		return view('pages.about');
	}
}
