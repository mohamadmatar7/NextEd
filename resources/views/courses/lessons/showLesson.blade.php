
@section('title', __('Lesson Details') . ' - ' . $lesson->name)

<x-app-layout>
    <x-lesson-assignment
        :title="$lesson->name"
        :description="$lesson->description"
        :details="[
            __('Start Time') => \Carbon\Carbon::parse($lesson->start_time)->format('F j, Y, g:i a'),
            __('End Time') => \Carbon\Carbon::parse($lesson->end_time)->format('F j, Y, g:i a'),
            __('Location') => $lesson->location
        ]"
        :notes="null"
        :attachments="[]"
        :videoUrl="$lesson->video"
        :adminLink="route('courses.lessons.attendance.form', ['program' => $program->id, 'course' => $course->id, 'lessonId' => $lesson->id])"
        :adminText="__('Attendance')"
    />
</x-app-layout>

