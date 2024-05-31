@section('title', __('template.Lessons') . ' - ' . @$course->name)

<x-app-layout>

    <x-group-cards title="{{ __('template.Lessons in') }} {{ @$course->name }}">
        @foreach($lessons as $lesson)
            <x-group-card :route="route('courses.lessons.showLesson', ['program' => $program->id, 'course' => $course->id, 'lesson' => $lesson->id])"
                          :title="$lesson->name"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                            :subtitle="$lesson->description"
                            :iconContainerClass="'w-full'"
                            :icon="asset('assets/icons/group/lessons.svg')"
                            :iconClass="'w-full h-40 object-cover'"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>