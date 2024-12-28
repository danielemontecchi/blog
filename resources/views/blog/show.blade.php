<x-layouts.app>
    <div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base/7 font-semibold text-indigo-600">{{optional($post->published_at)->format('d M Y')}}</p>
                        <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$post->title}}</h1>
                        <p class="mt-6 text-xl/8 text-gray-700">
                            {!! str($post->content)->markdown()->sanitizeHtml() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>