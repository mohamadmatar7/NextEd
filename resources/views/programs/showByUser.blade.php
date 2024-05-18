@section('title', __('template.Classes'))
<x-app-layout>

    @include('sections.courses-classes', [ 'sectionTitle' => __('template.My Programs'),
                                            'sectionButton' => __('template.Create Program'),
                                            'items' => $programs,
                                            'routeGenerator' => function ($item) { return route('programs.show', $item); },
                                            'sectionRoute' => route('programs.create') ])

</x-app-layout>