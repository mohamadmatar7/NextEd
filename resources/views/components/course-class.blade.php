@props(['items', 'routeGenerator'])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($items as $item)
    <a href="{{ $routeGenerator($item) }}"
        class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
        @if ($item->image)
        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-32 sm:h-48 object-cover">
        @endif
        <div class="px-4 py-4">
            <h3 class="text-xl font-bold dark:text-white">{{ $item->name }}</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $item->created_at->format('F d, Y') }}
            </p>
            <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $item->description }}</p>
        </div>
    </a>
    @endforeach
</div>