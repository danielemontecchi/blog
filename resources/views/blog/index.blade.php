<x-layouts.app>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the
                    blog</h2>
                <p class="mt-2 text-lg/8 text-gray-600">Learn how to grow your business with our expert advice.</p>
            </div>

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{optional($post->published_at)->format('Y-m-d')}}" class="text-gray-500">
                                {{optional($post->published_at)->format('d M Y')}}
                            </time>
                            {{--                    <a href="#"--}}
                            {{--                       class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>--}}
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">Illo sint voluptas. Error voluptates
                                culpa
                                eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed
                                exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

</x-layouts.app>