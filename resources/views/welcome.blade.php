@include('document.document-header')

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white p-4">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
                __('template.Dashboard') }}</a>
            @else
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
                __('template.Log in') }}</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
                __('template.Register') }}</a>
            @endif

            @endauth
        </div>


        <div class="flex flex-col">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <x-textarea :name="'body'" :label="'Post something'" :placeholder="'What is on your mind?'" />
                <x-file-input name="image" type="file" id="image" />
                <x-primary-button>Post</x-primary-button>
            </form>

            @foreach ($posts as $post)
            {{ dump($post) }}
            <div class="p-4 mt-4 bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $post->body }}</p>
                @if ($post->getFirstMedia('post-images'))
                <img src="{{ $post->getMedia('post-images')->last()->getUrl() }}" alt="{{ $post->user->name }}" />
                @endif
                <button type="button" onclick="likePost('{{ $post->id }}')">
                    Like
                </button>
                <span id="likeCount_{{ $post->id }}">{{ $post->likes->count() }}</span>
                @include('sections.comments' , ['comments' => $post->comments])
            </div>
            @endforeach
        </div>

        @endif
    </div>
    <script>
        function likePost(postId) {
            // Send AJAX request
            $.ajax({
                url: '/like/post/' + postId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    post_id: postId
                },
                success: function(response) {
                    // Update UI based on response
                    if (response.success) {
                        // Update like count in the UI
                        $('#likeCount_' + postId).text(response.likeCount);
                    }
                },
                error: function(xhr) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
    
    
</body>

</html>