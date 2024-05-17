<div class="md:w-2/12 lg:w-[12.9%] relative bg-white dark:bg-gray-800 border-r border-gray-50 dark:border-gray-100">
    <header class="md:sticky sm:top-0">
        <!-- Navbar (left side) -->
        <div class="w-full pr-2 flex justify-between md:block">
            <!--Logo-->
            <div class="flex pt-4 pl-2">
                <div class="shrink-0">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>


            <!-- Nav-->
            <div class="nav-container pt-4 relative">
                @include('sections.nav-mobile')

                @include('sections.nav-pc')
            </div>
        </div>
    </header>
</div>