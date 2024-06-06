@section('title', __('template.Announcements') . ' - ' . $announcement->title)
<x-app-layout>

    <x-show-announcement :announcement="$announcement" :relatedAnnouncements="$relatedAnnouncements" :relatedLink="route('courses.announcements.showAnnouncement', ['program' => $announcement->program->id, 'course' => $announcement->course->id, 'announcement' => $announcement->id])" />

</x-app-layout>