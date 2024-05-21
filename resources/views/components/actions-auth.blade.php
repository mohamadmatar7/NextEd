@props(['Id', 'route', 'hidden', 'itemType', 'likesCount'])

    @auth
    <div class="flex items-center mt-4 mb-2 space-x-4">
        <div class="flex items-center space-x-1">
            <button type="submit" onclick="likeItem('{{ $Id }}', '{{ $route }}', '{{ $hidden }}', '{{ $itemType }}')"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                <img src="{{ asset('assets/icons/post/like.svg') }}" alt="Like" class="mr-1 w-5 h-5">
                {{ __('template.Like') }}
            </button>
            <span id="likeCounts_{{ $itemType }}_{{ $Id }}" class="text-sm text-gray-500 dark:text-gray-400">{{ $likesCount }}</span>
        </div>

        <button type="button" onclick="document.getElementById('reply_{{ $itemType }}_{{ $Id }}').classList.toggle('hidden')"
            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
            <img src="{{ asset('assets/icons/post/comment.svg') }}" alt="Comment" class="mr-1 w-5 h-5">
            <span id="reactionCounts_{{ $itemType }}_{{ $Id }}">
                {{ $itemType === 'post' ? __('template.Comment') : __('template.Reply') }}
            </span>
        </button>
    </div>

    @endauth


    <script>
        function likeItem(itemId, route, isComment, itemType) {
            // Send AJAX request
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    [isComment ? 'comment_id' : (itemType === 'post' ? 'post_id' : 'reply_id')]: itemId
                },
                success: function(response) {
                    if (response.success) {
                        $('#likeCounts_' + itemType + '_' + itemId).text(response.likeCount);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    </script>