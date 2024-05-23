@section('title', __('template.Courses'))
<x-app-layout>

    <x-group-cards title="{{ __('template.Courses') }}">
        @php
            $iconPaths = [
                asset('assets/icons/courses/course-1.svg'),
                asset('assets/icons/courses/course-2.svg'),
                asset('assets/icons/courses/course-3.svg'),
                asset('assets/icons/courses/course-4.svg'),
            ];
        @endphp
        @foreach($courses as $item)
            @php
                $randomIndex = array_rand($iconPaths);
            @endphp
            <x-group-card :route="route('courses.show', $item)"
                          :title="$item['name']"
                          :class="'flex-col-reverse justify-center gap-y-2'"
                          :bodyClass="'flex flex-col gap-y-1'"
                          :subtitle="$item['description']"
                          :icon="$iconPaths[$randomIndex]"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>
