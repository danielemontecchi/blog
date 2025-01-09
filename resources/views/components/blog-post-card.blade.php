<article class="flex flex-col items-start justify-between">
    <div class="relative w-full">
        <img src="{{$post->cover_url}}"
             alt="{{ $post->title }}"
             class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="max-w-xl">
        <div class="mt-8 flex items-center gap-x-4 text-xs">
            <time datetime="{{optional($post->published_at)->format('Y-m-d')}}" class="text-gray-500">
                {{optional($post->published_at)->format('d M Y')}}
            </time>
            @foreach($post->categories as $category)
                <a href="#"
                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$category->name}}</a>
            @endforeach
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                <a href="{{ route('blog.show', $post->slug) }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{$post->intro}}</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
            <img src="{{asset('images/favicon/favicon.svg')}}"
                 alt="" class="size-10 rounded-full bg-gray-100">
            <div class="text-sm/6">
                <p class="font-semibold text-gray-900">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        Daniele Montecchi
                    </a>
                </p>
                <p class="text-gray-600">Founder / Dreamers</p>
            </div>
        </div>
    </div>
</article>