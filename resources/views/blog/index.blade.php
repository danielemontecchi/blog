<x-layouts.app>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From Code to
                    Inspiration</h2>
                <p class="mt-2 text-lg/8 text-gray-600">Guides, practical examples, and solutions for every web
                    development challenge.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-blog-post-card :$post/>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>