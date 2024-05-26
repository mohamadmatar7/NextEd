@section('title', __('template.Courses'))
<x-app-layout>

    <x-group-cards title="{{ __('template.Courses') }}">
        @foreach($courses as $item)
            @php
                $iconNumber = rand(1, 4);
            @endphp
            <x-group-card :route="route('courses.show', $item)"
                          :title="$item['name']"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                          :subtitle="$item['description']"
                          :icon="asset('assets/icons/courses/course-' . $iconNumber . '.svg')"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>
