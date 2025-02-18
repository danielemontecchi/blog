<div class="mx-auto max-w-2xl text-center">
	@if(!empty($eyebrow))
		<p class="text-base/7 font-semibold text-indigo-600 mb-2">{!! nl2br($eyebrow) !!}</p>
	@endif
	<h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-6xl">{!! nl2br($title) !!}</h2>
	@if(!empty($subtitle))
		<p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">{!! nl2br($subtitle) !!}</p>
	@endif
</div>
