@section('title', __('template.Lesson') . ' - ' . @$lesson->name)

<x-app-layout>

    <x-group-cards title="{{ __('template.Lesson') }} {{ @$lesson->name }}">
        <x-group-card :route="route('courses.showLesson', [$course, $lesson])"
                      :title="$lesson->name"
                      :class="'flex-col-reverse justify-center gap-y-2'"
                      :bodyClass="'flex flex-col gap-y-1'"
                        :subtitle="$lesson->description"
                        :icon="asset('assets/icons/lessons/lesson.svg')"
        />
    </x-group-cards>

</x-app-layout>