<x-html
        :title="isset($title) ? $title . ' | ' . config('app.name') : ''"
        class="bg-white h-screen antialiased leading-none"
>
    <x-slot name="head">
        @include('components.layouts.partials.metatag')

        @vite('resources/css/app.css')

        @livewireStyles
        @bukStyles
    </x-slot>

    <div class="bg-white">
        <x-layouts.partials.header/>

        <main class="isolate">
            {{ $slot }}
        </main>

        <x-layouts.partials.footer/>
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
    @bukScripts
</x-html>
