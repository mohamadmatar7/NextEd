@section('title', __('template.Programs'))
<x-app-layout>

<x-group-cards title="{{ __('template.Programs') }}">
    @foreach($programs as $item)
        @php
            $iconNumber = rand(1, 4);
        @endphp
        <x-group-card :route="route('programs.show', $item)"
                      :title="$item['name']"
                      :class="'flex-col-reverse justify-center gap-y-2'"
                      :bodyClass="'flex flex-col gap-y-1 items-center'"
                      :subtitle="$item['description']"
                      :icon="asset('assets/icons/programs/program-' . $iconNumber . '.svg')"
        />
    @endforeach
</x-group-cards>




</x-app-layout>