@props(['Id', 'route', 'hidden', 'itemType', 'likesCount'])

@auth
    <div class="flex items-center mt-4 space-x-4">
        
    <div class="flex items-center space-x-2">
            <button type="submit" onclick="likeItem('{{ $Id }}', '{{ $route }}', '{{ $hidden }}', '{{ $itemType }}')"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                <svg class="mr-1.5 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18.342l-1.45-1.32C3.352 12.277 0 9.14 0 5.5 0 2.42 2.42 0 5.5 0c1.882 0 3.58.928 4.5 2.357C10.92.928 12.618 0 14.5 0 17.58 0 20 2.42 20 5.5c0 3.64-3.352 6.777-8.55 11.522L10 18.342z" />
                </svg>
                {{ __('template.Like') }}
            </button>
        <span id="likeCounts_{{ $itemType }}_{{ $Id }}" class="text-sm text-gray-500 dark:text-gray-400">{{ $likesCount }}</span>
    </div>

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