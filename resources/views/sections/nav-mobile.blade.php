<details class="md:hidden relative z-10 group">
    <summary
        class="flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full cursor-pointer hover:bg-primary hover:text-white">
        <svg class="h-6 w-8 icon-closed group-open:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
        <svg class="h-6 w-8 hidden group-open:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </summary>
    <div
        class="absolute right-0 w-64 mt-2 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg">
        <nav>
            <a href="{{ route('welcome') }}"
                class="group flex items-center justify-start px-2 py-2 text-base leading-6 font-semibold  bg-primary text-white">
                <svg class="h-5 w-7 mr-1" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6">
                    </path>
                </svg>
                <span class="text-sm">{{ __('template.Home') }}</span>
            </a>
            <a href="{{ route('dashboard') }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span class="text-sm">{{ __('template.Dashboard') }}</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                <span class="text-sm">Notifications</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="text-sm">Messages</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M3 3h18v18H3zM21 9H3M21 15H3M12 3v18" />
                </svg>
                <span class="text-sm">Classes</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                </svg>
                <span class="text-sm">Courses</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  hover:bg-primary hover:text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span class="text-sm">Users</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium  bg-primary text-white">
                <svg class="h-5 w-7 mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <span class="text-sm">Chat</span>
            </a>
        </nav>
        <hr class="border-primaryLight my-4">
        <details class="w-full cursor-pointer">
            <summary class="flex items-center text-base leading-6 py-2 font-semibold hover:bg-primary hover:text-white">
                <div class="inline-flex justify-start items-center px-3 text-sm leading-4 font-medium w-full">
                    @if (Auth::user()->hasMedia('avatars'))
                    <img class="h-8 w-8 rounded-full mb-1"
                        src="{{ Auth::user()->getMedia('avatars')->last()->getUrl() }}"
                        alt="{{ Auth::user()->name }}" />
                    @else
                    <img class="h-8 w-8 rounded-full mb-1" src="{{ asset('assets/images/avatars/default-avatar.png') }}"
                        alt="{{ Auth::user()->name }}" />
                    @endif
                    <div class="block px-1 text-xs">
                        {{ Auth::user()->name }}
                    </div>
                    <div>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </summary>
            <div class="py-1 w-full">
                <a href="{{ route('profile.edit') }}"
                    class="group flex items-center px-4 py-2 text-sm leading-4 font-medium  hover:bg-primary hover:text-white">
                    {{ __('template.Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="group flex items-center px-4 py-2 text-sm leading-4 font-medium  w-full hover:bg-primary hover:text-white">
                        {{ __('template.Log Out') }}
                    </button>
                </form>
            </div>
        </details>
    </div>
</details>