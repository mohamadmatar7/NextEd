@section('title', __('template.Announcements') . ' - ' . @$course->name)
<x-app-layout>

    <x-group-cards title="{{ __('template.Announcements in') }} {{ @$course->name }}"
        :isPagination="$announcements->links('components.pagination')"
        >
        @foreach($announcements as $announcement)
            <x-group-card :route="route('courses.announcements.showAnnouncement', ['program' => $program->id, 'course' => $course->id, 'announcement' => $announcement['id']])"
                          :title="$announcement['title']"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                          :subtitle="$announcement['created_at']"
                          :icon="$announcement['image']"
            />
        @endforeach
    </x-group-cards>


</x-app-layout>