
@section('title', __('Lesson Details') . ' - ' . $lesson->name)

<x-app-layout>
    <div class="w-full mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-8 h-full">
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
                <div class="flex flex-col lg:flex-row justify-between gap-y-3 mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $lesson->name }}
                    </h2>
                    @can('is-administrator')
                        <a href="{{ route('courses.lessons.attendance.form', $lesson->id) }}" class="text-white font-bold py-2 px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 max-w-fit">
                            {{ __('template.Attendance') }}
                        </a>
                    @endcan
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <div>
                        <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('template.Lesson Fields.Start Time') }}:</span>
                        <div class="text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($lesson->start_time)->format('F j, Y, g:i a') }}</div>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('template.Lesson Fields.End Time') }}:</span>
                        <div class="text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($lesson->end_time)->format('F j, Y, g:i a') }}</div>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('template.Lesson Fields.Location') }}:</span>
                        <div class="text-gray-900 dark:text-gray-100">{{ $lesson->location }}</div>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('template.Lesson Fields.Description') }}:</span>
                        <div class="text-gray-900 dark:text-gray-100">{{ $lesson->description }}</div>
                    </div>
                </div>
                <div class="mb-6">
                    <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('template.Lesson Fields.Video') }}:</span>
                    <div class="mt-2">
                        <video class="w-full rounded-lg border border-gray-300 dark:border-gray-700" controls>
                            <source src="{{ $lesson->video }}" type="video/mp4">
                            {{ __('template.Your browser does not support the video tag.') }}
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

