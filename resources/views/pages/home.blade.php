<x-layouts.app>
    <div class="relative isolate -z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">

        @include('pages.home.about')

        @if(!empty($features))
            <div class="bg-white py-12 sm:py-20">
                @include('pages.home.features')
            </div>
        @endif

        <div class="bg-white py-12 sm:py-20">
            @include('pages.home.blog')
        </div>

    </div>
</x-layouts.app>
