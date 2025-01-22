<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
	/**
	 * @param array<int, string> $breadcrumbs
	 */
	public function __construct(
		public ?array $breadcrumbs = []
	) {
	}

	public function render(): View|Closure|string
	{
		return view('components.breadcrumbs');
	}
}
