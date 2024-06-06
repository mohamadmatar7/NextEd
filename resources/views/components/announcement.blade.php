@props(['Items', 'loopTitle', 'route'])

<div class="flex flex-col mb-6 md:h-[45.5vh]">
    <a href="{{ $route }}"
        class="flex hover:underline px-4 pt-4 hover:text-gray-600 dark:hover:text-gray-300  dark:text-white">
        <h3 class="text-3xl font-extrabold">{{ $loopTitle }}</h3>
    </a>
    <div class="overflow-y-aside flex flex-col mt-1">
        @foreach($Items as $item)
        <!--
        <a href="{{ route('courses.announcements.showAnnouncement', ['program' => $item->program->id, 'course' => $item->course->id, 'announcement' => $item->id]) }}"
        -->
        <a href="{{ route('announcements.show', ['announcement' => $item->id]) }}"
            class="flex flex-col p-4 border-gray-200 dark:border-gray-600 @if(!$loop->last) border-b @endif">
            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                @if ($item->image)
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-24 object-cover">
                @endif
                <div class="px-2 py-4">
                    <h3 class="text-xl font-bold dark:text-white">{{ $item->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $item->created_at->format('F d, Y') }} by {{
                        $item->user->name }}</p>
                    <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $item->body }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>