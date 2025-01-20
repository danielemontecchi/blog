@php use App\Settings\LinkSetting; @endphp
<footer class="bg-gray-100">
    <div class="mx-auto max-w-full pb-8 pt-8 sm:pt-12 lg:pt-16">
        <div class="mx-auto max-w-7xl">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8 lg:mx-8 px-6 lg:px-8">
                <div>
                    <div class="flex items-center h-9">
                        <img class="h-9" src="{{ asset('/images/favicon/favicon.svg') }}"
                             alt="{{config('site.credits.company')}}">
                        <span class="px-3 font-medium">{{config('site.name')}}</span>
                    </div>
                    <div class="flex gap-x-4 md:order-2 mt-4">
                        @php
                            $linkSetting = app(LinkSetting::class);
                        @endphp
                        @if(!empty($linkSetting->github))
                            <a href="https://github.com/{{ $linkSetting->github }}"
                               alt="{{ $linkSetting->github }}" target="_blank"
                               class="text-gray-600 hover:text-gray-800">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                        @endif
                        @if(!empty($linkSetting->x))
                            <a href="https://x.com/{{ $linkSetting->x }}" alt="{{ $linkSetting->x }}"
                               target="_blank" class="text-gray-600 hover:text-gray-800">
                                <span class="sr-only">X</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z"/>
                                </svg>
                            </a>
                        @endif
                        @if(!empty($linkSetting->linkedin))
                            <a href="https://www.linkedin.com/in/{{ $linkSetting->linkedin }}"
                               alt="{{ $linkSetting->linkedin }}" target="_blank"
                               class="text-gray-600 hover:text-gray-800">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="size-6" fill="currentColor" x="0px" y="0px" width="24" height="24"
                                     viewBox="0 0 50 50" aria-hidden="true">
                                    <path d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.668484 6 44 7.3315161 44 9 L 44 41 C 44 42.668484 42.668484 44 41 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 14 11.011719 C 12.904779 11.011719 11.919219 11.339079 11.189453 11.953125 C 10.459687 12.567171 10.011719 13.484511 10.011719 14.466797 C 10.011719 16.333977 11.631285 17.789609 13.691406 17.933594 A 0.98809878 0.98809878 0 0 0 13.695312 17.935547 A 0.98809878 0.98809878 0 0 0 14 17.988281 C 16.27301 17.988281 17.988281 16.396083 17.988281 14.466797 A 0.98809878 0.98809878 0 0 0 17.986328 14.414062 C 17.884577 12.513831 16.190443 11.011719 14 11.011719 z M 14 12.988281 C 15.392231 12.988281 15.94197 13.610038 16.001953 14.492188 C 15.989803 15.348434 15.460091 16.011719 14 16.011719 C 12.614594 16.011719 11.988281 15.302225 11.988281 14.466797 C 11.988281 14.049083 12.140703 13.734298 12.460938 13.464844 C 12.78117 13.19539 13.295221 12.988281 14 12.988281 z M 11 19 A 1.0001 1.0001 0 0 0 10 20 L 10 39 A 1.0001 1.0001 0 0 0 11 40 L 17 40 A 1.0001 1.0001 0 0 0 18 39 L 18 33.134766 L 18 20 A 1.0001 1.0001 0 0 0 17 19 L 11 19 z M 20 19 A 1.0001 1.0001 0 0 0 19 20 L 19 39 A 1.0001 1.0001 0 0 0 20 40 L 26 40 A 1.0001 1.0001 0 0 0 27 39 L 27 29 C 27 28.170333 27.226394 27.345035 27.625 26.804688 C 28.023606 26.264339 28.526466 25.940057 29.482422 25.957031 C 30.468166 25.973981 30.989999 26.311669 31.384766 26.841797 C 31.779532 27.371924 32 28.166667 32 29 L 32 39 A 1.0001 1.0001 0 0 0 33 40 L 39 40 A 1.0001 1.0001 0 0 0 40 39 L 40 28.261719 C 40 25.300181 39.122788 22.95433 37.619141 21.367188 C 36.115493 19.780044 34.024172 19 31.8125 19 C 29.710483 19 28.110853 19.704889 27 20.423828 L 27 20 A 1.0001 1.0001 0 0 0 26 19 L 20 19 z M 12 21 L 16 21 L 16 33.134766 L 16 38 L 12 38 L 12 21 z M 21 21 L 25 21 L 25 22.560547 A 1.0001 1.0001 0 0 0 26.798828 23.162109 C 26.798828 23.162109 28.369194 21 31.8125 21 C 33.565828 21 35.069366 21.582581 36.167969 22.742188 C 37.266572 23.901794 38 25.688257 38 28.261719 L 38 38 L 34 38 L 34 29 C 34 27.833333 33.720468 26.627107 32.990234 25.646484 C 32.260001 24.665862 31.031834 23.983076 29.517578 23.957031 C 27.995534 23.930001 26.747519 24.626988 26.015625 25.619141 C 25.283731 26.611293 25 27.829667 25 29 L 25 38 L 21 38 L 21 21 z"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="mt-16 grid grid-cols-3 gap-8 xl:col-span-2 xl:mt-0">
                    <div>
                        <h3 class="text-sm/6 font-semibold text-gray-900">The services I use</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="https://m.do.co/c/80d018a277bb" target="_blank"
                                   class="text-sm/6 text-gray-600 hover:text-gray-900">Hosted in
                                    <strong>DigitalOcean</strong></a>
                            </li>
                            <li>
                                <a href="https://ploi.io/register?referrer=wLn1QmmgALeOBw1OgPBm" target="_blank"
                                   class="text-sm/6 text-gray-600 hover:text-gray-900">Server managed by
                                    <strong>Ploi</strong></a>
                            </li>
                            <li>
                                <a href="https://www.freepik.com/" target="_blank"
                                   class="text-sm/6 text-gray-600 hover:text-gray-900">Images by
                                    <strong>Freepik</strong></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm/6 font-semibold text-gray-900">My services</h3>
                        {{--                        <ul role="list" class="mt-6 space-y-4">--}}
                        {{--                            <li>--}}
                        {{--                                <a href="#" target="_blank" class="text-sm/6 text-gray-600 hover:text-gray-900">Database--}}
                        {{--                                    Comuni Italiani</a>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                    </div>
                    <div>
                        <h3 class="text-sm/6 font-semibold text-gray-900">Legal information</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="{{route('pages.page',['slug'=>'terms'])}}"
                                   class="text-sm/6 text-gray-600 hover:text-gray-900">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="{{route('pages.page',['slug'=>'privacy'])}}"
                                   class="text-sm/6 text-gray-600 hover:text-gray-900">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{--        <div class="mt-16 border-t border-gray-900/10 pt-8 sm:mt-20 lg:mt-24 px-6 lg:px-8">--}}
        {{--            <div class="mx-auto max-w-7xl lg:flex lg:items-center lg:justify-between">--}}
        {{--                <div>--}}
        {{--                    <h3 class="text-sm/6 font-semibold text-gray-900">Subscribe to our newsletter</h3>--}}
        {{--                    <p class="mt-2 text-sm/6 text-gray-600">The latest news, articles, and resources, sent to your inbox--}}
        {{--                        weekly.</p>--}}
        {{--                </div>--}}
        {{--                <form class="mt-6 sm:flex sm:max-w-md lg:mt-0">--}}
        {{--                    <label for="email-address" class="sr-only">Email address</label>--}}
        {{--                    <input type="email" name="email-address" id="email-address" autocomplete="email" required--}}
        {{--                           class="w-full min-w-0 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:w-56 sm:text-sm/6"--}}
        {{--                           placeholder="Enter your email">--}}
        {{--                    <div class="mt-4 sm:ml-4 sm:mt-0 sm:shrink-0">--}}
        {{--                        <button type="submit"--}}
        {{--                                class="flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
        {{--                            Subscribe--}}
        {{--                        </button>--}}
        {{--                    </div>--}}
        {{--                </form>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="mt-8 border-t border-gray-900/10 pt-8 md:flex md:items-center md:justify-between  px-6 lg:px-8">
            <p class="mt-8 text-sm/6 text-gray-600 md:order-1 md:mt-0">
                &copy; {{date('Y')}} <span class="font-semibold">{{config('site.credits.company')}}</span>. All rights
                reserved.</p>
        </div>
    </div>
</footer>
