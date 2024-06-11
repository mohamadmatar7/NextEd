@section('title', __('template.Create') . ' ' . __('template.Course'))

<x-app-layout>
    <x-form-card title="{{  __('template.Course') . ' ' . __('template.Create') }}" action="{{ route('courses.store', ['program' => $program->id]) }}"
        enctype="multipart/form-data">
        <x-slot name="footer">
            <div class=" ">
                <x-input-label for="name" :value="__('template.Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="year" :value="__('template.Year')" />
                <x-select id="year" class="block mt-1 w-full" name="year" required>
                    @for ($i = 1; $i <= $program->years; $i++)
                        <option value="{{ $i }}">
                            @switch($i)
                                @case(1)
                                    {{ __('template.First Year') }}
                                    @break
                                @case(2)
                                    {{ __('template.Second Year') }}
                                    @break
                                @case(3)
                                    {{ __('template.Third Year') }}
                                    @break
                                @case(4)
                                    {{ __('template.Fourth Year') }}
                                    @break
                                @case(5)
                                    {{ __('template.Fifth Year') }}
                                    @break
                            @endswitch
                        </option>
                    @endfor
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="semester" :value="__('template.Semester')" />
                <x-select id="semester" class="block mt-1 w-full" name="semester" required>
                    @for ($i = 1; $i <= 2; $i++)
                        <option value="{{ $i }}">
                            @switch($i)
                                @case(1)
                                    {{ __('template.First Semester') }}
                                    @break
                                @case(2)
                                    {{ __('template.Second Semester') }}
                                    @break
                            @endswitch
                        </option>
                    @endfor
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="description" :value="__('template.Description')" />
                <x-textarea id="description" class="w-full" name="description" :value="old('description')"
                    :label="__('template.Description')" :placeholder="__('template.Description')" required />
            </div>
            <div class="mt-4">
                <x-input-label for="program_name" :value="__('template.Program')" />
                <x-text-input id="program_name" class="block mt-1 w-full" type="text" name="program_name" value="{{ $program->name }}" readonly />
                <input type="hidden" name="program_id" value="{{ $program->id }}">
            </div>
            <div class="mt-4">
                <x-input-label for="study_year" :value="__('template.Study Year')" />
                <x-text-input id="study_year" class="block mt-1 w-full" type="text" name="study_year"
                    :value="old('study_year')" required />
            </div>
            <div class="mt-4">
                <x-input-label for="start_date" :value="__('template.Start Date')" />
                <x-date-input id="start_date" class="block mt-1 w-full" type="date" name="start_date"
                    :value="old('start_date')" required />
            </div>
            <div class="mt-4">
                <x-input-label for="end_date" :value="__('template.End Date')" />
                <x-date-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')"
                    required />
            </div>

            <div class="mt-4">
                <x-input-label for="image" :value="__('template.Image')" />
                <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                     />
            </div>


            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="text-lg">
                    {{ __('template.Create') }}
                </x-primary-button>
            </div>
        </x-slot>
    </x-form-card>
</x-app-layout>
