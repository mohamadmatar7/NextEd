@section('title', __('template.Create') . ' ' . __('template.Announcement'))

<x-app-layout>
    <x-form-card title="{{ __('template.Announcement') . ' ' . __('template.Create') }}" action="{{ route('announcements.store') }}"
        enctype="multipart/form-data">
        <x-slot name="footer">
            <div class=" ">
                <x-input-label for="title" :value="__('template.Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                    autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="body" :value="__('template.Body')" />
                <x-textarea id="body" class="w-full" name="body" :value="old('body')"
                    :label="__('template.Body')" :placeholder="__('template.Body')" required />
            </div>
            <div class="mt-4">
                <x-input-label for="program_id" :value="__('template.Program')" />
                <x-select id="program_id" class="block mt-1 w-full" name="program_id">
                    <option value="">{{ __('template.Select Program') }}</option> <!-- Optional Placeholder -->
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                            {{ $program->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="course_id" :value="__('template.Course')" />
                <x-select id="course_id" class="block mt-1 w-full" name="course_id">
                    <option value="">{{ __('template.Select Course') }}</option> <!-- Optional Placeholder -->
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="image" :value="__('template.Image')" />
                <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"  />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="text-lg">
                    {{ __('template.Create') }}
                </x-primary-button>
            </div>
        </x-slot>
    </x-form-card>
</x-app-layout>