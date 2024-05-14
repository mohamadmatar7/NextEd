@props(['itemTitle', 'itemDate', 'itemUserName', 'itemBody', 'itemImage'])

<div class="flex flex-col mt-4">
    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
        @if ($itemImage)
            <img src="{{ $itemImage }}" alt="{{ $itemTitle }}" class="w-full h-24 object-cover">
        @endif
        <div class="px-6 py-4">
            <h3 class="text-xl font-bold dark:text-white">{{ $itemTitle }}</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $itemUserName }} - {{ $itemDate }}</p>
            <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $itemBody }}</p>
        </div>
    </div>
</div>