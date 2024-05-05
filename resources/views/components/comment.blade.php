@props(['userName', 'avatar', 'commentDate', 'commentBody', 'userId', 'class' => ''])
<article class="p-4 text-base bg-white rounded-lg dark:bg-gray-900 {{ $class }}">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                <img class="mr-2 w-6 h-6 rounded-full" src="{{ $avatar }}" alt="{{ $userName }}" />
                {{ $userName }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                    title="February 8th, 2022">{{
                    $commentDate }}</time></p>
        </div>

        @if (auth()->check() && auth()->user()->id == $userId || auth()->check() && auth()->user()->role == 4)

        <x-dropdown-comment  />
        
        @endif
    </footer>
    <p class="text-gray-500 dark:text-gray-400">{{ $commentBody }}</p>
    <div class="flex items-center mt-4 space-x-4">
        <button type="button"
            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
            </svg>
            {{ __('template.Reply') }}
        </button>
    </div>
</article>





