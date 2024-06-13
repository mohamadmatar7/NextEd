<ul class="grid grid-cols-2 sm:grid-cols-4 gap-1 my-4">
    @foreach($items as $item)
        @php
            $isActive = request()->url() == $item['route'];
        @endphp
        <li class="{{ $isActive ? 'hidden' : 'block' }}">
            <a href="{{ $item['route'] }}" class="flex items-center justify-center text-white focus-within:z-10 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 rounded border border-gray-200 dark:border-gray-700 focus:ring-4 focus:ring-blue-300 focus:outline-none flex-1" title="{{ $item['title'] }}">
                <span>{{ $item['title'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
