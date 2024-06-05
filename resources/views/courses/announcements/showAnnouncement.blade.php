@section('title', __('template.Announcements') . ' - ' . $announcement->title)
<x-app-layout>

    <div class="mx-auto w-full">
        <div class="bg-white dark:bg-gray-800 shadow-xl w-full h-full lg:py-2">
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
                <x-breadcrumb />
                <main class="mx-auto  w-full">
                    <article>
                        <header class="mx-auto w-full pt-10 text-center">
                            <p class="text-gray-500">{{ $announcement->created_at->format('F d, Y') }}</p>
                            <h1 class="mt-2 text-3xl font-bold text-gray-900 sm:text-5xl">{{ $announcement->title }}
                            </h1>
                            @php
                                $roleString = \App\Enums\Role::getDescription($announcement->user->role);
                            @endphp
                            <p class="mt-6 text-lg text-gray-700">{{ __('template.By') }} <a href="{{ route('users.showSpecificUser', ['role' => $roleString, 'user' => $announcement->user->id]) }}"
                            class="font-semibold">{{
                                    $announcement->user->name }}</a></p>

                            <img class="sm:h-[34rem] mt-10 w-full object-cover" src="{{ $announcement->image }}"
                                alt="Featured Image" />
                        </header>

                        <div
                            class="mx-auto mt-10 max-w-screen-md space-y-12 px-4 py-10 text-lg tracking-wide text-gray-700">
                            <p>{!! nl2br(e($announcement->body)) !!}</p>
                        </div>
                    </article>
                </main>

                <div class="w-fit mx-auto mt-10 flex space-x-2">
                    <div class="h-0.5 w-2 bg-blue-600"></div>
                    <div class="h-0.5 w-32 bg-blue-600"></div>
                    <div class="h-0.5 w-2 bg-blue-600"></div>
                </div>
                <aside aria-label="Related Articles" class="mx-auto mt-10 w-full">
                    <h2 class="mb-8 text-center text-5xl font-bold text-gray-900">{{ __('template.Related Announcements') }}</h2>
                    <div class="mx-auto grid justify-center px-4 md:grid-cols-2 md:gap-6 md:px-8 lg:grid-cols-3">
                        @foreach ($relatedAnnouncements as $key => $article)
                        <article class="w-full mx-auto my-4 flex flex-col overflow-hidden rounded-lg border border-gray-300 bg-white text-gray-900 transition hover:translate-y-2 hover:shadow-lg">
                            <a href="{{ route('courses.announcements.showAnnouncement', ['program' => $program->id, 'course' => $course->id, 'announcement' => $article->id]) }}" class="flex flex-col h-full">
                                <img src="{{ $article->image }}" class="h-56 w-full object-cover" alt="{{ $article->title }}" />
                                <div class="flex-auto px-6 py-5">
                                    <span class="mb-2 flex items-center text-sm font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                        {{ __('template.By') }}<span class="font-semibold">{{ $article->user->name }}</span>
                                    </span>
                                    <h3 class="mt-4 mb-3 text-xl font-semibold xl:text-2xl">{{ $article->title }}</h3>
                                    <p class="mb-4 text-base font-light">{{ $article->created_at->format('F d, Y') }}</p>
                                </div>
                            </a>
                        </article>
                        @endforeach
                    </div>
                </aside>
                
                
                
            </div>
        </div>
    </div>

</x-app-layout>