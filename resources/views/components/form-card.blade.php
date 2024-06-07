<div class="mx-auto w-full">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <x-breadcrumb />
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                {{ $title }}
            </h1>
            <form action="{{ $action }}" method="{{ $method ?? 'POST' }}" @if (isset($enctype)) enctype="{{ $enctype }}" @endif>
                @csrf
                {{ $slot }}
                <div class="w-full {{ $footerClass ?? '' }}">
                    {{ $footer ?? '' }}
                </div>
            </form>
        </div>
    </div>
</div>