<div class="mx-auto max-w-7xl px-6 lg:px-8">
	<x-section-header
		:title="$title"
		:subtitle="$subtitle"
		:eyebrow="$eyebrow"
	></x-section-header>
	<div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
		@foreach ($posts as $post)
			<x-blog-post-card :$post/>
		@endforeach
	</div>
	<div class="flex justify-end mt-16">
		<a href="{{route('blog.index')}}">
			see all blog articles
			<x-heroicon-o-chevron-right class="w-5 h-5 inline-block"/>
		</a>
	</div>
</div>
