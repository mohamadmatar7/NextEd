@section('title', __('template.Students') . ' - ' . @$course->name)

<x-app-layout>

    <x-dynamic-table 
        title="{{ __('template.Students in') }} {{ @$course->name }}"
        routeText="{{ __('template.Student') }} {{ __('template.Add') }}"
        createRoute="{{ '' }}"
        addRoute="{{ route('courses.storeStudentsToCourse', ['course' => $course->id]) }}"
        courseId="{{ $course->id }}"
        searchFor="{{ __('template.students') }}"
        type="students"
        :tableHeaders="[
            __('template.Name'),
            __('template.Email'),
            __('template.Actions')
        ]">

        @slot('tableRows')
            @foreach($students as $user)
                <tr class="search-row">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300 user-name">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 user-email">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">{{ __('template.View') }}</a>
                        @can('is-admin-or-principal')
                        <a href="" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-500 ml-4">{{ __('template.Edit') }}</a>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-500 ml-4" title="{{ __('template.Delete from the course') }}" x-data="" x-on:click="$dispatch('open-modal', 'delete-form-user-{{ $user->id }}')">{{ __('template.Delete') }}</button>
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