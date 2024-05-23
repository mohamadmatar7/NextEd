<div class="md:w-2/12 lg:w-[12.9%] relative bg-white dark:bg-gray-800 border-r border-gray-50 dark:border-gray-100">
    <header class="md:sticky md:top-0 md:h-svh">
        <!-- Navbar (left side) -->
        <div class="w-full pr-2 flex justify-between md:block md:h-full md:hover:overflow-y-auto sidebar">
            <style>
                @media screen and (min-width: 768px){
                    .sidebar {
                            width: 100%;
                            height: 100%;
                            overflow-y: auto;
                            padding-right: 8px; 
                            box-sizing: content-box;
                        }

                        .sidebar:hover {
                            padding-right: 2px; /* Reduce padding on hover to show the scrollbar */
                        }

                        .sidebar::-webkit-scrollbar {
                            width: 6px;
                        }

                        .sidebar::-webkit-scrollbar-thumb {
                            background-color: rgba(0, 0, 0, 0.2);
                            border-radius: 6px;
                        }

                        .sidebar::-webkit-scrollbar-thumb:hover {
                            background-color: rgba(0, 0, 0, 0.4);
                        }
                }
            </style>
            <!--Logo-->
            <div class="flex pt-4 pl-2">
                <div class="shrink-0">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>


            <!-- Nav-->
            <div class="nav-container pt-4 relative md:h-full">
                @include('sections.nav-mobile-color')

                @include('sections.nav-pc-color')
            </div>
        </div>
    </header>
</div>