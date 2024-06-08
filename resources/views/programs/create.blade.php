@section('title', __('template.Create') . ' ' . __('template.Program'))

<x-app-layout>
    <x-form-card title="{{ __('template.Create') . ' ' . __('template.Program') }}" action="{{ route('programs.store') }}"
        enctype="multipart/form-data">
        <x-slot name="footer">
            <div class="mt-4">
                <x-input-label for="name" :value="__('template.Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="category_id" :value="__('template.Category')" />
                <x-select id="category_id" class="block mt-1 w-full" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="years" :value="__('template.Years')" />
                <x-select id="years" class="block mt-1 w-full" name="years" required>
                    @for ($i = 2; $i <= 5; $i++)
                        <option value="{{ $i }}">
                            @switch($i)
                                @case(2)
                                    {{ __('template.Two Years') }}
                                    @break
                                @case(3)
                                    {{ __('template.Three Years') }}
                                    @break
                                @case(4)
                                    {{ __('template.Four Years') }}
                                    @break
                                @case(5)
                                    {{ __('template.Five Years') }}
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

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="text-lg">
                    {{ __('template.Create') }}
                </x-primary-button>
            </div>
        </x-slot>
    </x-form-card>
</x-app-layout>