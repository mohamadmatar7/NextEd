<div class="mx-auto w-full">
    <div class="bg-white dark:bg-gray-800 shadow-xl w-full h-full lg:py-2">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <x-breadcrumb />
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                {{ $title }}
            </h1>
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

