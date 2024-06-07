@section('title', __('template.Administrators') . ' - ' . @$course->name)

<x-app-layout>
    <x-dynamic-table 
        title="{{ __('template.Administrators in') }} {{ @$course->name }}"
        routeText="{{ __('template.Create') }} {{ __('template.Administrator') }}"
        createRoute="{{ '' }}"
        :tableHeaders="[
            __('template.Name'),
            __('template.Email'),
            __('template.Role'),
            __('template.Actions')
        ]">

        @slot('tableRows')
            @foreach($administrators as $user)
                <tr class="search-row">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300 user-name">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 user-email">{{ $user->email }}</td>
                    @php
                        $roleString = \App\Enums\Role::getDescription($user->role);
                    @endphp
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $roleString }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">{{ __('View') }}</a>
                        @can('is-admin-or-principal')
                        <a href="" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-500 ml-4">{{ __('Edit') }}</a>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-500 ml-4" x-data="" x-on:click="$dispatch('open-modal', 'delete-form-user-{{ $user->id }}')">{{ __('Delete') }}</button>
                            <x-modal focusable class="p-6" name="delete-form-user-{{ $user->id }}" :show="''">
                                <form method="post" action="{{ route('courses.destroyUserFromCourse', ['course' => @$course->id, 'user' => $user->id]) }}" class="p-6 whitespace-normal">
                                    @csrf
                                    @method('delete')
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('template.Are you sure you want to delete') }} <span class="font-bold underline">{{ $user->name }}</span>?
                                    </h2>
                                    <p class="my-2 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('template.Once this user is deleted, all of its resources and data will be permanently deleted.') }}
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
                        @endcan
                    </td>
                </tr>
            @endforeach
        @endslot
    </x-dynamic-table>
</x-app-layout>