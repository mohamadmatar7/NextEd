@section('title', __('template.Announcements') . ' - ' . @$course->name)
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

    <x-group-cards title="{{ __('template.Announcements in') }} {{ @$course->name }}"
        :isPagination="$announcements->links('components.pagination')"
        :tabs="$items"
        >
        @foreach($announcements as $announcement)
            <x-group-card :route="route('courses.announcements.showAnnouncement', ['program' => $program->id, 'course' => $course->id, 'announcement' => $announcement['id']])"
                          :title="$announcement['title']"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                          :subtitle="$announcement['created_at']->format('F d, Y')"
                          :iconContainerClass="'w-full'"
                          :icon="$announcement['image']"
                          :iconClass="'w-full h-40 object-cover'"
            />
        @endforeach
    </x-group-cards>


</x-app-layout>