@section('title', __('template.Assignments') . ' - ' . $course->name)

<x-app-layout>
@php
                    $items = [
                        [
                            'route' => route('courses.assignments.showAssignmentsByUser', [ $program->id, $course->id, auth()->user()->id]),
                            'title' => __('template.Assignments'),
                            'subtitle' => __('Manage and view all assignments'),
                            'icon' => asset('assets/icons/group/assignments.svg'),
                        ],
                        [
                            'route' => route('courses.announcements.showAnnouncements', [$program->id, $course->id]),
                            'title' => __('template.Announcements'),
                            'subtitle' => __('Manage and view all announcements'),
                            'icon' => asset('assets/icons/group/announcements.svg'),
                        ],
                        [
                            'route' => route('courses.showStudents', [$program->id, $course->id]),
                            'title' => __('template.Students'),
                            'subtitle' => __('Manage and view all students'),
                            'icon' => asset('assets/icons/group/users.svg'),
                        ],
                        [
                            'route' => route('courses.showAdministrators', [$program->id, $course->id]),
                            'title' => __('template.Administrators'),
                            'subtitle' => __('Manage and view all administrators'),
                            'icon' => asset('assets/icons/group/administrators.svg'),
                        ],
                        [
                            'route' => route('courses.lessons.showLessons', [$program->id, $course->id]),
                            'title' => __('template.Lessons'),
                            'subtitle' => __('Manage and view all lessons'),
                            'icon' => asset('assets/icons/group/lessons.svg'),
                        ],
                    ];
                @endphp
    <x-group-cards title="{{ __('template.Assignments in') }} {{ $course->name }}"
    :tabs="$items"
    >
        @foreach($assignments as $assignment)
            <x-group-card 
                :route="route('courses.assignments.showAssignmentByUser', ['program' => $program->id, 'course' => $course->id, 'assignment' => $assignment->id, 'user_id' => Auth::user()->id])"
                :title="$assignment->name"
                :class="'flex-col-reverse justify-center gap-y-2'"
                :bodyClass="'flex flex-col gap-y-1'"
                :subtitle="$assignment->description"
                :icon="asset('assets/icons/assignments/assignment.svg')"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>
