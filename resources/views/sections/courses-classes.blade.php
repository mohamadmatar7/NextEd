<div class="mx-auto w-full flex justify-center">
    <div class="p-4 py-6 sm:px-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
        <div class="flex justify-between items-center">
            <h2 class="px-4 pt-4 pb-2 text-3xl font-extrabold dark:text-white">{{ $sectionTitle }}</h2>
            @if (Auth::user()->role == 3 || Auth::user()->role == 4)
            <a href="{{ $sectionRoute }}"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primaryLight hover:bg-primaryLight focus:outline-none focus:shadow-outline-primary">
                {{ $sectionButton }}
            </a>
            @endif
        </div>
        <div class="mt-4">
            <x-course-class :items="$items" :routeGenerator="$routeGenerator" />
        </div>
    </div>
</div>