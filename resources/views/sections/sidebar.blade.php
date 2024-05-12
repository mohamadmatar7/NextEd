<div class="md:w-1/6 relative">
<header class="h-screen sm:sticky sm:top-0 sm:left-0">
    <!-- Navbar (left side) -->
    <div class="w-full pr-2">
        <!--Logo-->
        <div class="flex items-center pt-4 px-4">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('welcome') }}">
                    <x-application-logo class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
        </div>


        <!-- Nav-->
        <nav class="mt-5">
            <a href="{{ route('dashboard') }}"
                class="group flex items-center px-4 py-2 text-base leading-6 font-semibold  bg-gray-800 text-blue-300 rounded-e-full">
                <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6">
                    </path>
                </svg>
                {{ __('template.Dashboard') }}
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-semibold rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                </svg>

                Explore
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                Notifications
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                Messages
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z">
                </svg>
                Classes
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z">
                </svg>
                Subjects
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19v-1a4 4 0 0 0-4-4H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-1">
                    </path>
                    <rect width="6" height="3" x="9" y="14" class="fill-current" rx="1"></rect>
                    <rect width="6" height="3" x="9" y="10" class="fill-current" rx="1"></rect>
                </svg>
                Announcements
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                    </path>
                </svg>
                Profile
            </a>
            <a href="#"
                class="mt-1 group flex items-center px-4 py-2 text-base leading-6 font-medium rounded-e-full hover:bg-gray-800 hover:text-blue-300">
                <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                More
            </a>

            <button class="bg-blue-400 hover:bg-blue-500 w-full mt-5 text-white font-bold py-2 rounded-e-full">
                Chat
            </button>
        </nav>


        <!-- User Menu -->
        <div class="absolute w-full" style="bottom: 1rem;">
            <div class="flex-shrink-0 flex hover:bg-gray-800 rounded-r-full">
                <a href="{{ route('profile.edit') }}" class="flex-shrink-0 group block w-full px-4 py-2">
                    <div class="flex items-center">
                        <div>
                            @auth
                                @if (auth()->user()->getFirstMedia('avatars'))
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ auth()->user()->getFirstMedia('avatars')->getUrl() }}"
                                        alt="{{ auth()->user()->name }}">
                                @else
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ asset('assets/images/avatars/default-avatar.png') }}"
                                        alt="{{ auth()->user()->name }}">
                                @endif
                            @else
                                <img class="inline-block h-10 w-10 rounded-full"
                                    src="{{ asset('assets/images/avatars/default-avatar.png') }}" alt="User">
                            @endauth
                        </div>
                        <div class="ml-2">
                            <p class="text-base leading-6 font-medium text-gray-400">
                                @auth
                                {{ '@' . auth()->user()->name }}
                                @else
                                {{ __('template.Guest') }}
                                @endauth
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
</div>