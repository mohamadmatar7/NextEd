<div class="mx-auto w-full h-full">
    <div class="bg-white dark:bg-gray-800 shadow-xl w-full h-full lg:py-2">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <x-breadcrumb />
            <div class="flex justify-between items-baseline">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    {{ $title }}
                </h1>
                @if (@$routeCreate)
                    @can('is-admin-or-principal')
                        <a href="{{ $routeCreate }}"
                        class="flex items-center md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                            <span class="mr-2">{{ $routeTitle }}</span>
                        </a>
                    @endcan
                @endif
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{ $slot }}
            </div>
            @if($isPagination ?? false)
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-8">
                    <ul class="pagination flex items-center space-x-2">
                        {!! $isPagination !!}
                    </ul>
                </nav>
            @endif
    </div>
</div>

