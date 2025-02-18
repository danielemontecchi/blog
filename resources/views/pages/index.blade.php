<?php

use function Laravel\Folio\name;

name('pages.home');
?>
@php
	use App\Models\{BlogCategory, BlogPost};

	$posts = BlogPost::published()
		->latest('published_at')
		->take(6)
		->get();

	$features = BlogCategory::where('is_featured', true)
		->orderBy('order')
		->get();
@endphp

<x-layouts.app>
	<div class="relative isolate -z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">

		@include('pages.index.about')

		@if(!empty($features))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.features')
			</div>
		@endif

		<div class="bg-white py-12 sm:py-20">
			@include('pages.index.blog')
		</div>

	</div>
</x-layouts.app>
