@section('title', __('template.Courses'))
<x-app-layout>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <div class="flex justify-between">
                        <h3 class="text-2xl font-bold dark:text-white">{{ __('template.My Courses') }}</h3>
                        @if (Auth::user()->role == 3 || Auth::user()->role == 4)
                            <a href="{{ route('courses.create') }}"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary-600 hover:bg-primary-700 focus:outline-none focus:shadow-outline-primary">
                                {{ __('template.Create Course') }}
                            </a>
                        @endif
                    </div>
                    <div class="mt-6">
                        <div class="flex flex-col">
                            @foreach($courses as $course)
                            <a href="{{ route('courses.show', $course) }}"
                                class="flex flex-col p-4 border-gray-200 dark:border-gray-600 @if(!$loop->last) border-b @endif">
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                    @if ($course->image)
                                    <img src="{{ $course->image }}" alt="{{ $course->title }}" class="w-full h-24 object-cover">
                                    @endif
                                    <div class="px-2 py-4">
                                        <h3 class="text-xl font-bold dark:text-white">{{ $course->title }}</h3>
                                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $course->created_at->format('F d, Y') }}</p>
                                        <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $course->description }}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</x-app-layout>
