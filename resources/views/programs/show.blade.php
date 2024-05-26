@section('title', __('template.Programs') . ' - ' . $program->name)

<x-app-layout>
    <x-group-cards title="{{ __('template.Years in') . ' ' . __('template.Program') . ' - ' . $program->name }}">
        @for ($year = 1; $year <= $program->years; $year++)
            <x-group-card :route="route('programs.showYear', ['program' => $program->id, 'year' => $year])"
                        :title="__('template.Year')"
                        :class="'flex-col-reverse justify-center gap-y-1'"
                        :bodyClass="'flex flex-col gap-y-1 items-center'"
                        :subtitle="__('template.View Courses') . ' (' . $program->courses->where('year', $year)->count() . ')'"
                        :icon="asset('assets/icons/years/' . $year . '.svg?')"
            />
        @endfor
    </x-group-cards>
</x-app-layout>
