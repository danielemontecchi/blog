<x-filament::widget>
    @if(!empty($analyticsData['activeUsers']) || !empty($analyticsData['screenPageViews']))
        <x-filament::card>
            <div>
                <h3 class="text-base font-semibold text-gray-900">Last 30 days</h3>
                <dl class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
                    @isset($analyticsData['activeUsers'])
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">Active Users</dt>
                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                    {{$analyticsData['activeUsers']}}
                                </div>
                            </dd>
                        </div>
                    @endisset
                    @isset($analyticsData['screenPageViews'])
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-base font-normal text-gray-900">Page Views</dt>
                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                    {{$analyticsData['screenPageViews']}}
                                </div>
                            </dd>
                        </div>
                    @endisset
                </dl>
            </div>
        </x-filament::card>
    @endif
</x-filament::widget>
