@section('title', __('template.Lessons') . ' - ' . @$course->name)

<x-app-layout>

    <x-group-cards title="{{ __('Lessons in') }} {{ @$course->name }}">
        @foreach($lessons as $lesson)
            <x-group-card :route="route('courses.showLesson', [$course, $lesson])"
                          :title="$lesson->name"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                            :subtitle="$lesson->description"
                            :icon="asset('assets/icons/lessons/lesson.svg')"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>