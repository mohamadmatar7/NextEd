@props(['post', 'itemType', 'Id'])
<section class="bg-white dark:bg-gray-900 pt-4 my-4 antialiased hidden"  id="reply_{{ $itemType }}_{{ $post->id }}">
    <div class="mr-auto px-4">
        @auth
        <form class="mb-3" action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="body" class="sr-only">{{ __('template.Your comment') }}</label>
                <textarea name="body" id="body" rows="2" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="{{ __('template.Write a comment...') }}" required></textarea>
            </div>
            <x-primary-button>{{ __('template.Post') }}</x-primary-button>
        </form>
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
                        : asset('assets/images/avatars/avatar-' . strtolower($comment->user->gender) . '.svg');
                @endphp

                <x-comment 
                    :comment="$comment" 
                    :userName="$comment->user->name" 
                    :avatar="$avatarUrl" 
                    :commentDate="$comment->created_at->diffForHumans()" 
                    :commentBody="$comment->body" 
                    :itemType="'comment'"
                    :route="route('like.comment', $comment->id)"
                    :likesCount="$comment->likes->count()"
                    :class="'py-1 px-4'"
                    :hidden=true
                    :Id="$comment->id"
                    userId="{{ $comment->user_id }}" 
                />
                @foreach ($comment->replies as $reply)
                    <x-comment 
                    :comment="$reply" 
                    :userName="$reply->user->name" 
                    :avatar="asset('assets/images/avatars/default-avatar.png')" 
                    :commentDate="$reply->created_at->diffForHumans()" 
                    :commentBody="$reply->body" 
                    :class="'ml-3 lg:ml-12'"
                    :itemType="'reply'"
                    :likesCount="$reply->likes->count()"
                    :hidden=false 
                    :Id="$reply->id" 
                    :route="route('like.reply', $reply->id)" 
                    userId="{{ $reply->user_id }}" 
                    />
                @endforeach
            </div>
        @endforeach
    </div>
</section>


