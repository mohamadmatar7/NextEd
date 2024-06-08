@props(['name', 'label', 'placeholder'])
<div
    class="py-2 px-4 mt-1 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <label for="{{ $name }}" class="sr-only">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="2"
        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
        placeholder="{{ $placeholder }}"></textarea>

    @error($name)
    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>