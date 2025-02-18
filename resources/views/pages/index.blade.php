<x-layouts.app>
	<div class="relative isolate -z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">

		@include('pages.index.about')

		@if(!empty($features))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.features')
			</div>
		@endif

		@if(!empty($postsLatest))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.blog', [
					'posts' => $postsLatest,
					'eyebrow' => 'Recent Articles',
					'title' => "Code with purpose.\nCreate with passion",
					'subtitle' => 'Explore the latest articles on coding, creativity, and innovation.',
				])
			</div>
		@endif

		@if(!empty($postsPopular))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.blog', [
					'posts' => $postsPopular,
					'eyebrow' => 'Popular Picks',
					'title' => "Top Articles\nfor Curious Minds",
					'subtitle' => 'Explore the articles that developers found most insightful and inspiring.',
				])
			</div>
		@endif

	</div>
</x-layouts.app>
