@section('title', __('template.Assignments') . ' - ' . $course->name)

<x-app-layout>

    <x-group-cards title="{{ __('template.Assignments in') }} {{ $course->name }}">
        @foreach($assignments as $assignment)
            <x-group-card 
                :route="route('courses.assignments.showAssignmentByUser', ['program' => $program->id, 'course' => $course->id, 'assignment' => $assignment->id, 'user_id' => Auth::user()->id])"
                :title="$assignment->name"
                :class="'flex-col-reverse justify-center gap-y-2'"
                :bodyClass="'flex flex-col gap-y-1'"
                :subtitle="$assignment->description"
                :icon="asset('assets/icons/assignments/assignment.svg')"
            />
        @endforeach
    </x-group-cards>

</x-app-layout>
