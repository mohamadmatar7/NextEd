@section('title', __('template.Courses'))
<x-app-layout>

    @include('sections.courses-classes', [ 'sectionTitle' => __('template.My Courses'),
                                            'sectionButton' => __('template.Create Course'),
                                            'items' => $courses,
                                            'routeGenerator' => function ($item) { return route('courses.show', $item); },
                                            'sectionRoute' => route('courses.create') ])

</x-app-layout>