<section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
    <div class="max-w-4xl mr-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">{{ __('template.Discussion') }} ({{ $post->comments->count() }})</h2>
        </div>

        @auth
        <form class="mb-3" action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="body" class="sr-only">{{ __('template.Your comment') }}</label>
                <textarea name="body" id="body" rows="2" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="{{ __('template.Write a comment...') }}" required></textarea>
            </div>
            <x-primary-button>{{ __('template.Post') }}</x-primary-button>
        </form>
        @else
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('template.Please') }} <a href="{{ route('login') }}" class="text-blue-500 hover:underline">{{ __('template.Log in') }}</a> {{ __('template.to post a comment.') }}</p>
        @endauth
        @foreach ($post->comments as $comment)
            @if (!$loop->last)
                <div class="border-b border-gray-200">
            @else
                <div>
            @endif
                @php
                    $avatarUrl = $comment->user->getFirstMedia('avatars')
                        ? $comment->user->getMedia('avatars')->last()->getUrl()
                        : asset('assets/images/avatars/default-avatar.png');
                @endphp

                <x-comment 
                    :comment="$comment" 
                    :userName="$comment->user->name" 
                    :avatar="$avatarUrl" 
                    :commentDate="$comment->created_at->diffForHumans()" 
                    :commentBody="$comment->body" 
                    :id="$comment->id" 
                    userId="{{ $comment->user_id }}" 
                />
                @foreach ($comment->replies as $reply)
                    <x-comment :comment="$reply" :userName="$reply->user->name" :avatar="asset('assets/images/avatars/default-avatar.png')" :commentDate="$reply->created_at->diffForHumans()" :commentBody="$reply->body" :class="'ml-3 lg:ml-12'" :id="$reply->id" userId="{{ $reply->user_id }}" />
                @endforeach
            </div>
        @endforeach
    </div>
</section>

