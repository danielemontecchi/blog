<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeader extends Component
{
	public function __construct(
		public string  $title,
		public ?string $subtitle,
		public ?string $eyebrow,
	)
	{
	}

	public function render(): View|Closure|string
	{
		return view('components.section-header');
	}
}
