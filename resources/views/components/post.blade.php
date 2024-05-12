<li>
    <!--Post-->
    <article>
        <div class="flex p-4 pb-0 my-2">
            <a class="block" href="">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ $post->user->getFirstMedia('avatars') ? $post->user->getFirstMedia('avatars')->getUrl() : asset('assets/images/avatars/default-avatar.png') }}"
                            alt="{{ $post->user->name }}">

                    </div>
                    <div class="ml-2">
                        <p class="text-base leading-6 font-medium ">
                            <span
                                class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                {{ '@' . $post->user->name }}. {{ $post->created_at->diffForHumans() }}
                            </span>
                        </p>
                    </div>
                </div>
            </a>
        </div>


        <div class="pl-8">
            <p class="text-base width-auto font-medium  flex-shrink">
                {{ $post->body }}
            </p>

            @if ($post->getFirstMedia('post-images'))
            <div class="md:flex-shrink pr-6 pt-3">
                <div class="bg-cover bg-no-repeat bg-center rounded-lg w-full h-64">
                    <img class="w-full h-full object-fill" src="{{ $post->getMedia('post-images')->last()->getUrl() }}"
                        alt="{{ $post->user->name }}">
                </div>
            </div>
            @endif

            @include('components.actions-auth', ['Id' => $post->id, 'route' => route('like.post', $post->id), 'hidden'
            => false, 'itemType' => 'post', 'likesCount' => $post->likes->count()])
        </div>
        @include('sections.comments' , ['comments' => $post->comments])
        <hr class="border-gray-200">
    </article>

</li>


