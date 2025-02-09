<x-layouts.app>
	<div class="bg-white mt-20">
		@if(!empty($post->cover_url))
			<div aria-hidden="true" class="relative">
				<img src="{{$post->cover_url}}" alt="{{ $post->title }}"
					 class="h-96 w-full object-cover">
				<div class="absolute inset-0 bg-gradient-to-t from-white"></div>
			</div>
		@endif

		<div class="relative mx-auto -mt-12 max-w-7xl px-4 pb-16 sm:px-6 sm:pb-24 lg:px-8">
			<x-breadcrumbs :$breadcrumbs/>
			<div class="mx-auto max-w-2xl text-center lg:max-w-4xl mt-2">
				<p class="text-base/7 font-semibold text-indigo-600">{{optional($post->published_at)->format('d M Y')}}</p>
				<h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $post->title }}</h1>
				@foreach($post->categories as $category)
					<div class="mt-10">
						<a href="{{ route('blog.category', $category->slug) }}"
						   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$category->name}}</a>
					</div>
				@endforeach
			</div>

			<div class="prose mt-10 max-w-2xl text-base/7 text-gray-600">
				{!! str($post->content)->markdown()->sanitizeHtml() !!}
			</div>

			@if(!empty($relatedPosts))
				<h2 class="text-xl font-bold mb-4 mt-20">Related posts</h2>
				<div
					class="mx-auto mt-8 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
					@foreach ($relatedPosts as $relatedPost)
						<x-blog-post-card :post="$relatedPost"/>
					@endforeach
				</div>
			@endif
		</div>

	</div>
</x-layouts.app>
