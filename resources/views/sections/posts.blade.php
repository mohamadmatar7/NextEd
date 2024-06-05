<div class="relative @if (!@$loadMore)md:w-7/12 lg:w-[63%]@endif">
    <div class="flex">
        <section class="bg-white dark:bg-gray-900 py-6 px-2 antialiased">
            <!--Content (Center)-->
                <div class="flex">
                    <div class="flex-1">
                        <h2 class="px-4 py-4 text-4xl font-extrabold dark:text-white">{{ __('template.Community') }}</h2>
                    </div>
                </div>
                <!--middle create Post above icons-->
                @auth
                <div class="flex">
                    <div class="m-2 w-10 py-1">
                        @if (auth()->user()->getFirstMedia('avatars'))
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ auth()->user()->getFirstMedia('avatars')->getUrl() }}"
                            alt="{{ auth()->user()->name }}">
                        @else
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ asset('assets/images/avatars/avatar-' . strtolower(auth()->user()->gender) . '.svg') }}"
                            alt="{{ auth()->user()->name }}">
                        @endif
                    </div>
                    <div class="flex-1 px-2 pt-2 mt-2">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div>
                                <label for="body" class="sr-only">{{ __('template.Post something') }}</label>
                                <x-textarea :name="'body'" :label="'Post something'" :placeholder="__('template.What is on your mind?')" />
                            </div>
                    </div>
                </div>

                <!--middle create Post below icons-->
                <div class="flex justify-between">
                    <div class="px-2">
                        <div class="flex items-center">
                            <div class="text-center px-1 py-1 my-2 mx-1">
                                <input type="file" name="image" id="image" class="hidden">
                                <label for="image" class="mt-1 group flex items-center px-1 py-2 text-base leading-6 font-medium rounded-full cursor-pointer">
                                    <img src="{{ asset('assets/icons/post/image-file.svg') }}" alt="Upload Image" class="text-center h-8 w-7">
                                </label>
                            </div>

                            <div class="text-center py-2 my-2 mx-1">
                                <label for="video" class="mt-1 group flex items-center px-1 py-2 text-base leading-6 font-medium rounded-full cursor-pointer">
                                    <img src="{{ asset('assets/icons/post/video-file.svg') }}" alt="Upload Video" class="text-center h-8 w-7">
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="py-2 m-2">
                        <x-primary-button>{{ __('template.Post') }}</x-primary-button>
                    </div>
                </form>
                </div>
                <hr class="border-gray-300 border-2">
                @endauth

            <ul class="divide-y divide-gray-200" @if (@$loadMore) id="post-list" @endif>
                @foreach ($posts as $post)
                    @include('components.post')
                @endforeach
            </ul>

            @if (@$loadMore)
                <div class="flex justify-center my-5">
                    <x-secondary-button class="hidden" id="load-more-btn" onclick="loadMorePosts('{{ $posts->nextPageUrl() }}')">{{ __('template.Load more') }}</x-secondary-button>
                </div>
                <script>
                    function loadMorePosts(url) {
                        if (url) {
                            fetch(url)
                                .then(response => response.text())
                                .then(data => {
                                    const parser = new DOMParser();
                                    const html = parser.parseFromString(data, 'text/html');
                                    const posts = html.getElementById('post-list').innerHTML;
                                    document.getElementById('post-list').innerHTML += posts;
                                    const loadMoreBtn = html.getElementById('load-more-btn');
                                    if (loadMoreBtn) {
                                        console.log(document.getElementById('post-list').children.length);
                                        document.getElementById('load-more-btn').replaceWith(loadMoreBtn);
                                    } else {
                                        document.getElementById('load-more-btn').remove();
                                    }
                                });
                        } else {
                            document.getElementById('load-more-btn').remove();
                        }
                    }

                    window.addEventListener('scroll', () => {
                        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                            const loadMoreBtn = document.getElementById('load-more-btn');
                            if (loadMoreBtn) {
                                loadMoreBtn.click();
                            }
                        }
                    });
                </script>
            @endif
        </section>
    </div>
</div>
@section('scripts')
    <script>
        // Dropdown button functionality for posts comments and replies
        let dropdownButtons = document.querySelectorAll('[data-dropdown-toggle]');
        dropdownButtons.forEach((button) => {
            button.addEventListener('click', () => {
                button.nextElementSibling.classList.toggle('hidden');
            });
        });
    </script>
@endsection