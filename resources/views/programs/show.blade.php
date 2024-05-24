@section('title', __('template.Programs') . ' - ' . $program->name)

<x-app-layout>
    <x-group-cards title="{{ __('template.Courses in') . ' ' . $program->name }}">
        @foreach($program->courses as $item)
            <x-group-card :route="route('courses.show', $item)"
                        :title="$item['name']"
                        :class="'flex-col-reverse justify-center gap-y-2'"
                        :bodyClass="'flex flex-col gap-y-1'"
                        :subtitle="$item['description']"
                        :icon="$item['image']"
            />
        @endforeach
    </x-group-cards>
</x-app-layout>