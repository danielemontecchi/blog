<x-filament::page>
    <form wire:submit.prevent="save">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base/7 font-semibold text-gray-900">Site</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Main information and basic settings of your site.</p>
                </div>

                <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="site_name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                                <div class="mt-2">
                                    <input type="text" name="site_name" id="site_name"
                                           wire:model.defer="settings.site_name"
                                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                @error('settings.site_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="site_description"
                                       class="block text-sm/6 font-medium text-gray-900">Description</label>
                                <div class="mt-2">
                            <textarea name="site_description" id="site_description" rows="3"
                                      wire:model.defer="settings.site_description"
                                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                                @error('settings.site_description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base/7 font-semibold text-gray-900">Mode</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">Operating modes of site.</p>
                </div>

                <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <div class="flex gap-3">
                                    <div class="flex h-6 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="is_maintenance_mode" aria-describedby="comments-description"
                                                   name="is_maintenance_mode"
                                                   type="checkbox"
                                                   wire:model.defer="settings.is_maintenance_mode"
                                                   class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                 viewBox="0 0 14 14" fill="none">
                                                <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                      d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                      d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-sm/6">
                                        <label for="is_maintenance_mode" class="font-medium text-gray-900">Maintenance
                                            mode</label>
                                        <p id="comments-description" class="text-gray-500">Get notified when someones
                                            posts a comment on a posting.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-filament::button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save settings
            </x-filament::button>
        </div>
    </form>
</x-filament::page>