<x-layouts.app>
	<div class="relative isolate -z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">

		@include('pages.index.about')

		@if(!empty($features))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.features')
			</div>
		@endif

		@if(!empty($posts))
			<div class="bg-white py-12 sm:py-20">
				@include('pages.index.blog')
			</div>
		@endif

	</div>
</x-layouts.app>
