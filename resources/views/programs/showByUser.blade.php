@section('title', __('template.Classes'))
<x-app-layout>

<x-group-cards title="{{ __('template.Programs') }}">
    @foreach($programs as $item)
        <x-group-card :route="route('programs.show', $item)"
                      :title="$item['name']"
                      :class="'flex-col-reverse justify-center gap-y-2'"
                      :bodyClass="'flex flex-col gap-y-1'"
                    :subtitle="$item['description']"
                    :icon="$item['image']"
        />
    @endforeach
</x-group-cards>



</x-app-layout>