@props(['userName', 'avatar', 'commentDate', 'commentBody', 'userId', 'Id', 'itemType', 'likesCount', 'route', 'hidden', 'class' => ''])
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

        <x-dropdown-comment  :userId="$userId" :Id="$Id" />
        
        @endif
    </footer>
    <p class="text-gray-500 dark:text-gray-400">{{ $commentBody }}</p>

    @include('components.actions-auth', ['Id' => $Id, 'route' => $route, 'hidden' => $hidden, 'itemType' => $itemType, 'likesCount' => $likesCount])

</article>

