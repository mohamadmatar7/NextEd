@section('title', __('template.Year') . ' ' . $year . ' - ' . $program->name)

<x-app-layout>
    <x-group-cards title="{{ __('template.Courses in') . ' ' . __('template.Year') . ' ' . $year . ' - ' . $program->name }}">
        @foreach ($program->courses as $course)
            @php
                $iconNumber = rand(1, 4);
            @endphp
            @if ($course->year == $year)
                <x-group-card :route="route('courses.show', ['course' => $course->id, 'program' => $program->id])"
                            :title="$course->name . ' - ' . 'S' . $course->semester"
                            :class="'flex-col-reverse justify-center gap-y-1'"
                            :bodyClass="'flex flex-col gap-y-1 items-center'"
                            :subtitle="__('template.View Course')"
                            :icon="asset('assets/icons/courses/course-' . $iconNumber . '.svg')"
                />
            @endif
        @endforeach
    </x-group-cards>
</x-app-layout>
