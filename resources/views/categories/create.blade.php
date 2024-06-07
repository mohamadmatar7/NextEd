@section('title', __('template.Create') . ' ' . __('template.Category'))

<x-app-layout>
    <x-form-card title="{{ __('template.Create') . ' ' . __('template.Category') }}" action="{{ route('categories.store') }}"
        enctype="multipart/form-data">
        <x-slot name="footer">
            <div class="mt-4">
                <x-input-label for="name" :value="__('template.Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="description" :value="__('template.Description')" />
                <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')"
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