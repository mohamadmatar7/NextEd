@section('title', __('template.Announcements') . ' - ' . $announcement->title)
<x-app-layout>

    <x-show-announcement :announcement="$announcement" :relatedAnnouncements="$relatedAnnouncements" :relatedLink="route('announcements.show', ['announcement' => $announcement->id])" />

</x-app-layout>