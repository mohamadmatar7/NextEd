@section('title', __('template.Courses') . ' - ' . $course->name)
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('template.Courses') }}
        </h2>
    </x-slot>


</x-app-layout>