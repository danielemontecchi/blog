@php use App\Settings\SeoSetting; @endphp
	<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.layouts.partials.metatag')
	@if(!SEO::getTitle())
		<title>{{ app(SeoSetting::class)->meta_name }}</title>
	@endif

	@vite('resources/css/app.css')

	@livewireStyles
	@bukStyles

	@stack('head')
</head>

<body class="bg-white h-screen antialiased leading-none">
<div class="bg-white">
	<x-layouts.partials.header/>

	<main class="isolate">
		{{ $slot }}
	</main>

	<x-layouts.partials.footer/>
	<x-layouts.partials.cookie/>
</div>

<!-- Scripts -->
@vite('resources/js/app.js')
@livewireScripts
@bukScripts
@stack('scripts')
</body>
</html>
