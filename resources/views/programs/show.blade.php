@section('title', __('template.Classes') . ' - ' . $program->name)

<x-app-layout>

@include('sections.courses-classes', [ 'sectionTitle' => __('template.Courses in') . ' - ' . $program->name,
                                        'sectionButton' => __('template.Create Course'),
                                        'items' => $program->courses,
                                        'routeGenerator' => function ($item) { return route('courses.show', $item); },
                                        'sectionRoute' => route('courses.create') ])


</x-app-layout>