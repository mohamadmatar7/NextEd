@section('title', __('template.Program Announcements'))


<x-app-layout>

<x-group-cards title="{{ __('template.Program Announcements') }}"
            :isPagination="$announcementsPrograms->links('components.pagination')">
        @foreach($announcementsPrograms as $announcement)
            <x-group-card :route="route('announcements.show', ['announcement' => $announcement['id']])"
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