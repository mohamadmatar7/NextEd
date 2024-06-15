
@props(['userId', 'type', 'top' => false, 'typeId'])
<div class="flex flex-col absolute right-0 @if(!@$top)
    top-0 @else top-2 @endif">
<!-- Dropdown button -->
<button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
    class="inline-flex justify-end items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    type="button">
    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
        <path
            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
    </svg>
    <span class="sr-only">settings</span>
</button>
<!-- Dropdown menu -->
<div id="dropdownComment1"
    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
        @if (auth()->check() && auth()->user()->id == $userId)
        <li>
            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('template.Edit') }}</a>
        </li>
        @endif
        <li>
            <button x-data="" x-on:click="$dispatch('open-modal', 'delete-form-{{ $type }}-{{ $userId }}')"
                class=" cursor-pointer block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('template.Delete') }}</button>
        </li>
        <x-modal focusable class="p-6" name="delete-form-{{ $type }}-{{ $userId }}" :show="''">
        <form method="post" action="{{ route($type . 's.destroy', [$type => $typeId]) }}"
        class="p-6 whitespace-normal">
                @csrf
                @method('delete')
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('template.Are you sure you want to delete this ' . $type . '?') }}
                </h2>
                <p class="my-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('template.Once this ' . $type . ' is deleted, all of its resources and data will be permanently deleted.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('template.Cancel') }}
                    </x-secondary-button>
                    <x-danger-button class="ms-3">
                        {{ __('template.Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </ul>
</div>
</div>



