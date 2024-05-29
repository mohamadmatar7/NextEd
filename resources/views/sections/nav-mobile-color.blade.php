<details class="md:hidden relative z-10 group">
    <summary
        class="flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full cursor-pointer bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
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
                class="group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'welcome' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/home.svg') }}" alt="Home" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Home') }}</span>
            </a>
            <a href="{{ route('dashboard') }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/dashboard.svg') }}" alt="Dashboard" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Dashboard') }}</span>
            </a>
            @can('is-administrator')
            <a href="{{ route('categories.index') }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('categories.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/categories.svg') }}" alt="Categories" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Categories') }}</span>
            </a>
            <a href="{{ route('users.showByRoles') }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('users.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/users.svg') }}" alt="Users" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Users') }}</span>
            </a>
            @endcan
            <a href="{{ route('programs.showByUser', Auth::user()->id) }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('programs.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/classes.svg') }}" alt="Classes" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Programs') }}</span>
            </a>
            <a href="{{ route('courses.showByUser', Auth::user()->id) }}"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('courses.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/courses.svg') }}" alt="Courses" class="h-6 w-8 mr-2">
                <span class="text-sm">{{ __('template.Courses') }}</span>
            </a>
            <a href="/messenger"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'messenger' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/chat.svg') }}" alt="Chat" class="h-6 w-8 mr-2">
                <span class="text-sm">Chat</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'notifications' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/notifications.svg') }}" alt="Notifications" class="h-6 w-8 mr-2">
                <span class="text-sm">Notifications</span>
            </a>
            <a href="#"
                class="mt-1 group flex items-center justify-start px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'messages' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
                <img src="{{ asset('assets/icons/nav/messages.svg') }}" alt="Messages" class="h-6 w-8 mr-2">
                <span class="text-sm">Messages</span>
            </a>
        </nav>

        <hr class="border-primaryLight my-4">
        <details class="w-full cursor-pointer">
            <summary class="flex items-center text-base leading-6 py-2 font-semibold bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
                <div class="inline-flex justify-start items-center px-3 text-sm leading-4 font-medium w-full">
                    @if (Auth::user()->hasMedia('avatars'))
                    <img class="h-8 w-8 rounded-full mb-1"
                        src="{{ Auth::user()->getMedia('avatars')->last()->getUrl() }}"
                        alt="{{ Auth::user()->name }}" />
                    @else
                    <img class="h-8 w-8 rounded-full mb-1" src="{{ asset('assets/images/avatars/avatar-' . strtolower(Auth::user()->gender) . '.svg') }}"
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
                    class="group flex items-center px-4 py-2 text-sm leading-4 font-medium  bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
                    {{ __('template.Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="group flex items-center px-4 py-2 text-sm leading-4 font-medium  w-full bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
                        {{ __('template.Log Out') }}
                    </button>
                </form>
            </div>
        </details>
    </div>
</details>