<x-html
        :title="isset($title) ? $title . ' | ' . config('app.name') : ''"
        class="bg-white h-screen antialiased leading-none"
>
    <x-slot name="head">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="icon" type="image/png" href="{{ asset('/images/favicon/favicon-96x96.png') }}"
              sizes="96x96"/>
        <link rel="icon" type="image/svg+xml" href="{{ asset('/images/favicon/favicon.svg') }}"/>
        <link rel="shortcut icon" href="{{ asset('/images/favicon/favicon.ico') }}"/>
        <link rel="apple-touch-icon" sizes="180x180"
              href="{{ asset('/images/favicon/apple-touch-icon.png') }}"/>
        <meta name="apple-mobile-web-app-title" content="Daniele Montecchi"/>
        <link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}"/>

        @vite('resources/css/app.css')

        @livewireStyles
        @bukStyles
    </x-slot>

    <div class="bg-white">
        <x-layouts.header/>

        <main class="isolate">
            {{ $slot }}
        </main>

        <x-layouts.footer/>
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
    @bukScripts
</x-html>
