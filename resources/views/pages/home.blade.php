<x-layouts.app :title="__('Dashboard')">
    <div class="relative isolate -z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">
        <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:-mr-80 lg:-mr-96"
             aria-hidden="true"></div>
        <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
            @include('pages.home.about')
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-12 bg-gradient-to-t from-white sm:h-24"></div>

        <div class="bg-white py-12 sm:py-20">
            @include('pages.home.features')
        </div>

        <div class="bg-white py-12 sm:py-20">
            @include('pages.home.blog')
        </div>

    </div>
</x-layouts.app>
