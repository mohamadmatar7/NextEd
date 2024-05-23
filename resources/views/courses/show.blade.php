@section('title', __('template.Courses') . ' - ' . $course->name)
<x-app-layout>

<x-group-cards title="{{ __('Course Overview') }}">
        @foreach($items as $item)
            <x-group-card :route="$item['route']"
                          :title="$item['title']"
                            :class="' '"
                          :subtitle="$item['subtitle']"
                          :icon="$item['icon']"
            />
        @endforeach
    </x-group-cards>


</x-app-layout>