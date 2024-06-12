<div class="nav-toggle hidden md:flex md:flex-col md:justify-between md:h-[90%]">
    <nav class="mt-5">
        <a href="{{ route('welcome') }}"
            class="group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'welcome' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/home.svg') }}" alt="Home" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Home') }}</span>
        </a>
        <a href="{{ route('dashboard') }}"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/dashboard.svg') }}" alt="Dashboard" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Dashboard') }}</span>
        </a>
        @can('is-administrator')
        <a href="{{ route('categories.index') }}"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('categories.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/categories.svg') }}" alt="Categories" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Categories') }}</span>
        </a>
        <a href="{{ route('users.showByRoles') }}"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('users.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/users.svg') }}" alt="Users" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Users') }}</span>
        </a>
        @endcan
        <a href="{{ route('programs.showByUser', Auth::user()->id) }}"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('programs.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/classes.svg') }}" alt="Classes" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Programs') }}</span>
        </a>
        <a href="{{ route('courses.showByUser', Auth::user()->id) }}"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('courses.*') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/courses.svg') }}" alt="Courses" class="h-6 w-8">
            <span class="text-sm">{{ __('template.Courses') }}</span>
        </a>
        <a href="/messenger"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('messenger') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/chat.svg') }}" alt="Chat" class="h-6 w-8">
            <span class="text-sm">Chat</span>
        </a>
        <a href="#"
            class="mt-1 group flex flex-col items-center justify-center px-2 py-2 text-base leading-6 font-medium rounded-e-full {{ request()->routeIs('notifications') ? 'bg-blue-700 dark:bg-gray-900 text-white' : 'bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white' }}">
            <img src="{{ asset('assets/icons/nav/notifications.svg') }}" alt="Notifications" class="h-6 w-8">
            <span class="text-sm">Notifications</span>
        </a>
    </nav>

    <!-- User Menu -->
    <details class="w-full cursor-pointer group mt-2">
        <summary class="flex-shrink-0 flex bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 text-white rounded-r-full">
            <div class="flex items-center justify-center px-3 py-2 text-sm leading-4 font-medium w-full">
                <!-- Container for Avatar and Name in a column -->
                <div class="flex flex-col items-center space-y-1">
                    <!-- User Avatar -->
                    @if (Auth::user()->hasMedia('avatars'))
                        <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->getMedia('avatars')->last()->getUrl() }}" alt="{{ Auth::user()->name }}" />
                    @else
                        <!-- If user does not have an avatar, display a default image -->
                        <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/avatars/avatar-' . strtolower(Auth::user()->gender) . '.svg') }}" alt="{{ Auth::user()->name }}" />
                    @endif

                    <div>{{ substr(Auth::user()->last_name, 0, 1) . substr(Auth::user()->first_name, 0, 1) }}</div>
                </div>
                <!-- SVG Arrow -->
                <svg class="w-4 h-4 ml-2 transition duration-300 ease-in transform rotate-0 group-open:rotate-180"

                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </summary>

        <div class="py-4 w-full">
            <!-- User's Name -->
            <div class="block px-4 py-2 text-xs text-gray-700 dark:text-primary cursor-text">
                {{ Auth::user()->name }}
            </div>
            <a href="{{ route('profile.edit') }}"
                class="group flex items-center px-4 py-2 text-base leading-4 font-medium rounded-e-full bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
                {{ __('template.Profile') }}
            </a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="group flex items-center px-4 py-2 text-base leading-4 font-medium rounded-e-full w-full bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">
                    {{ __('template.Log Out') }}
                </button>
            </form>
        </div>
    </details>
</div>