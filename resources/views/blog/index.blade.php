<x-layouts.app>
    <div class="flex flex-row-reverse bg-white py-16 sm:py-24">
        <div class="flex-1 mx-auto max-w-7xl px-6 lg:px-8">
            <x-breadcrumbs :$breadcrumbs/>

            <!-- Title -->
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                    From Code to Inspiration
                </h2>
                <p class="mt-2 text-lg text-gray-600">
                    Guides, practical examples, and solutions for every web development challenge.
                </p>
            </div>

            <!-- Posts list -->
            <div class="mx-auto my-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-blog-post-card :$post/>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links('vendor.pagination.tailwindui') }}
            </div>
        </div>
    </div>
</x-layouts.app>
