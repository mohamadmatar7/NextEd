@section('title', __('template.Categories'))

<x-app-layout>

    <x-group-cards title="{{ __('template.Categories') }}"
                    routeCreate="{{ route('categories.create') }}"
                    routeTitle="{{ __('template.Category') }} {{ __('template.Create') }}"
    >
        @foreach($categories as $category)
            <x-group-card :route="route('categories.show', $category)"
                          :title="$category->name"
                          :class="' '"
                          :subtitle="$category->description"
                          :icon="asset('assets/icons/categories/' . strtolower($category->name) . '.svg')"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>