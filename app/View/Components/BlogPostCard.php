<?php
namespace App\View\Components;

use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogPostCard extends Component
{
	public function __construct(
		public BlogPost $post
	) {
	}

	public function render(): View|Closure|string
	{
		return view('components.blog-post-card');
	}
}
