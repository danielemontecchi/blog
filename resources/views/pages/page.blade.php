<x-layouts.app>
    <div class="bg-white px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
            @if($page->is_markdown)
                {!! \Str::markdown($page->content) !!}
            @else
                {!! $page->content !!}
            @endif
        </div>
    </div>
</x-layouts.app>
