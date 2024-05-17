@section('title', __('template.Courses'))
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('template.Courses') }}
        </h2>
    </x-slot>

    @include('sections.courses-classes', [ 'sectionTitle' => __('template.My Courses'), 'sectionRoute' => route('courses.index'), 'sectionButton' => __('template.Create Course'), 'items' => $courses ])


</x-app-layout>