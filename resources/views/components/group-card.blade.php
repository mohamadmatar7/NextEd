<a href="{{ $route }}"
   class="group relative block p-6 bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r dark:from-gray-700 dark:to-gray-900 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-0 group-hover:opacity-100 transition duration-300"></div>
    <div class="relative z-10">
        <div class="flex items-center space-x-4 {{ @$class }}">
            <div class="flex-1 {{ @$bodyClass }}">
                <div class="text-xl font-medium text-white group-hover:text-yellow-300 transition duration-300">{{ $title }}</div>
                <p class="text-gray-200 group-hover:text-yellow-100 transition duration-300">{{ $subtitle }}</p>
            </div>
            <div class="flex-shrink-0">
                <img src="{{ $icon }}" alt="{{ $title }} icon" class="h-12 w-12 text-white group-hover:text-yellow-300 transition duration-300">
            </div>
        </div>
    </div>
</a>