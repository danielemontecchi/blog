<div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:text-center">
        <h2 class="text-base/7 font-semibold text-indigo-600">Deploy faster</h2>
        <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl lg:text-balance">
            What you will find here</p>
    </div>
    <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">

            @foreach($features as $feature)
                <div class="flex flex-col">
                    <dt class="flex items-center gap-x-3 text-base/7 font-semibold text-gray-900">
                        <x-dynamic-component
                                :component="'heroicon-o-' . $feature->icon"
                                class="size-5 flex-none text-indigo-600"
                        />
                        {{ $feature->title }}
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base/7 text-gray-600">
                        <p class="flex-auto">{{ $feature->description }}</p>
                        <p class="mt-6">
                            <a href="{{ route('blog.category', ['slug' => $feature->slug])  }}"
                               class="text-sm/6 font-semibold text-indigo-600">Learn more <span
                                        aria-hidden="true">→</span></a>
                        </p>
                    </dd>
                </div>
            @endforeach

        </dl>
    </div>
</div>
