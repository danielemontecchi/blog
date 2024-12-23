<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-500">
            My Laravel Blog
        </a>
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="text-gray-700 hover:text-blue-500 md:hidden">
                ☰
            </button>
            <nav :class="{'hidden': !open, 'block': open}"
                 class="absolute right-0 top-full bg-white shadow-lg md:relative md:top-auto md:right-auto md:shadow-none md:flex md:space-x-4">
                <a href="{{ route('home') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-500">Home</a>
                <a href="{{ route('about') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-500">About</a>
                <a href="{{ route('blog.index') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-500">Blog</a>
            </nav>
        </div>
    </div>
</header>

<main class="container mx-auto px-4 py-8">
    @yield('content')
</main>
<footer class="bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto text-center">
        &copy; {{ date('Y') }} Evolvify. All rights reserved.
    </div>
</footer>

@vite('resources/js/app.js')
</body>
</html>
