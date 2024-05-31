
@section('title', __('Assignment Details') . ' - ' . $assignment->name)

<x-app-layout>
    <x-lesson-assignment
        :title="$assignment->name"
        :description="$assignment->description"
        :details="[
            __('Due Date') => \Carbon\Carbon::parse($assignment->due_date)->format('F j, Y, g:i a')
        ]"
        :notes="$assignment->notes"
        :attachments="$assignment->getMedia('attachments')->map(fn($media) => ['url' => $media->getUrl(), 'name' => $media->name])->toArray()"
        :adminLink="'#'"
        :adminText="__('Edit Assignment')"
    />
</x-app-layout>
