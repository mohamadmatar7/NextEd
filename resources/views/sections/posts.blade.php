<div class="flex justify-center">
    <div class="flex m-auto">
        <section class="w-2/5 m-auto">
            <!--Content (Center)-->
            <aside>
                <div class="flex">
                    <div class="flex-1 mx-2">
                        <h2 class="px-4 py-4 text-2xl font-semibold ">{{ __('template.Community') }}</h2>
                    </div>
                </div>

                <hr class="border-gray-400">
                <!--middle creat tweet-->
                @auth
                <div class="flex">
                    <div class="m-2 w-10 py-1">
                        @if (auth()->user()->getFirstMedia('avatars'))
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ auth()->user()->getFirstMedia('avatars')->getUrl() }}"
                            alt="{{ auth()->user()->name }}">
                        @else
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ asset('assets/images/avatars/default-avatar.png') }}"
                            alt="{{ auth()->user()->name }}">
                        @endif
                    </div>
                    <div class="flex-1 px-2 pt-2 mt-2">
                        <x-textarea :name="'body'" :label="'Post something'" :placeholder="'What is on your mind?'" />
                    </div>
                </div>

                <!--middle create Post below icons-->
                <div class="flex justify-between">
                    <div class="px-2">
                        <div class="flex items-center">
                            <div class="text-center px-1 py-1 m-2">
                                <a href="#"
                                    class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full">
                                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </a>
                            </div>

                            <div class="text-center py-2 m-2">
                                <a href="#"
                                    class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full">
                                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                        </path>
                                        <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="py-2 m-2">
                        <x-primary-button>{{ __('template.Post') }}</x-primary-button>
                    </div>
                </div>
                <hr class="border-gray-300 border-2">
                @endauth
            </aside>

            <ul class="">
                @foreach ($posts as $post)
                    @include('components.post')
                @endforeach
            </ul>
        </section>
    </div>
</div>