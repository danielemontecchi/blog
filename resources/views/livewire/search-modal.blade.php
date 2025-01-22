<div
        @keydown.window.escape="openedModalSearch = false"
        @keydown.window.prevent.slash="
            openedModalSearch = true;
            $nextTick(() => $refs.searchInput?.focus());
        "
        x-init="$watch('openedModalSearch', value => {
            if(value) { $nextTick(() => $refs.searchInput?.focus()); }
        })"
        class="relative z-10" role="dialog" aria-modal="true" x-cloak>

    <!-- Sfondo con effetto blur e chiusura al click -->
    <div
            x-show="openedModalSearch"
            class="fixed inset-0 bg-gray-200/30 backdrop-blur-lg transition-opacity"
            @click.self="openedModalSearch = false"
            aria-hidden="true" x-cloak/>


    <!-- Modale -->
    <div x-show="openedModalSearch"
         @keydown.escape.window="openedModalSearch = false"
         class="fixed inset-0 z-10 w-screen overflow-y-auto p-4 sm:p-6 md:p-20"
         x-cloak>

        <div class="mx-auto max-w-2xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black/5 transition-all">

            <!-- Campo di ricerca -->
            <div class="grid grid-cols-1">
                <input type="text"
                       x-ref="searchInput"
                       wire:model.live.debounce.500ms="search"
                       class="col-start-1 row-start-1 h-12 w-full pl-11 pr-4 text-base text-gray-900 outline-none placeholder:text-gray-400 sm:text-sm"
                       placeholder="Search...">

                <x-heroicon-o-magnifying-glass
                        class="pointer-events-none col-start-1 row-start-1 ml-4 size-5 self-center text-gray-400"/>
            </div>

            @if(!empty($initialLinks) && empty($search))
                <!-- Initial Links -->
                <ul class="max-h-80 scroll-py-2 divide-y divide-gray-100 overflow-y-auto">
                    @foreach($initialLinks as $group=>$links)
                        <li class="p-2">
                            <h2 class="mb-2 mt-4 px-3 text-xs font-semibold text-gray-500">{{$group}}</h2>
                            <ul class="text-sm text-gray-700">
                                @foreach($links as $link)
                                    <li class="group cursor-pointer select-none rounded-md px-3 py-2 hover:bg-gray-200">
                                        <a href="{{ $link['link'] }}" class="flex items-center">
                                            @if(!empty($link['icon']))
                                                <x-dynamic-component
                                                        :component="'heroicon-o-' . $link['icon']"
                                                        class="size-6 flex-none text-gray-400"
                                                />
                                            @endif
                                            <span class="ml-3 flex-auto truncate">{{ $link['title'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(!empty($search))
                @if(!empty($results))
                    <div class="p-2">
                        <!-- Search results -->
                        <h2 class="mb-2 mt-4 px-3 text-xs font-semibold text-gray-500">Posts</h2>
                        <ul class="max-h-96 overflow-y-auto text-sm text-gray-700">
                            @foreach($results as $result)
                                <li class="group cursor-pointer select-none rounded-md px-3 py-2 hover:bg-indigo-600 hover:text-white">
                                    <a href="{{ $result['link'] }}" class="flex items-center">
                                        <x-dynamic-component
                                                :component="'heroicon-o-' . $link['icon']"
                                                class="size-6 flex-none text-gray-400"
                                        />
                                        <span class="ml-3 flex-auto truncate">{{ $result['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <!-- Results empty -->
                    <div class="px-6 py-14 text-center sm:px-14">
                        <x-heroicon-o-cube-transparent class="mx-auto size-6 text-gray-400"/>
                        <p class="mt-4 text-sm text-gray-900">No results found. Please try again.</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
