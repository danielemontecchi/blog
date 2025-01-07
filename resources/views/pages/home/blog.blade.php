<div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Code with
            purpose. Create with passion.</h2>
    </div>
    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach ($posts as $post)
            <article class="flex flex-col items-start justify-between">
                <div class="relative w-full">
                    @if($post->cover)
                        <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}"
                             class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                    @endif
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>
                <div class="max-w-xl">
                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                        <time datetime="{{$post->published_at->toDateString()}}"
                              class="text-gray-500">{{$post->published_at->toFormattedDateString()}}</time>
                        <a href="#"
                           class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <a href="{{route('blog.show', $post->slug)}}">
                                <span class="absolute inset-0"></span>
                                {{$post->title}}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{\Str::limit($post->content, 100)}}</p>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <div class="flex justify-end mt-16">
        <a href="{{route('blog.index')}}">
            see all blog articles
            <x-heroicon-o-chevron-right class="w-5 h-5 inline-block"/>
        </a>
    </div>
</div>