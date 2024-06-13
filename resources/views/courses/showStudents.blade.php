@section('title', __('template.Students') . ' - ' . @$course->name)

<x-app-layout>

@php
                    $items = [
                        [
                            'route' => route('courses.assignments.showAssignmentsByUser', [ $program->id, $course->id, auth()->user()->id]),
                            'title' => __('template.Assignments'),
                            'subtitle' => __('Manage and view all assignments'),
                            'icon' => asset('assets/icons/group/assignments.svg'),
                        ],
                        [
                            'route' => route('courses.announcements.showAnnouncements', [$program->id, $course->id]),
                            'title' => __('template.Announcements'),
                            'subtitle' => __('Manage and view all announcements'),
                            'icon' => asset('assets/icons/group/announcements.svg'),
                        ],
                        [
                            'route' => route('courses.showStudents', [$program->id, $course->id]),
                            'title' => __('template.Students'),
                            'subtitle' => __('Manage and view all students'),
                            'icon' => asset('assets/icons/group/users.svg'),
                        ],
                        [
                            'route' => route('courses.showAdministrators', [$program->id, $course->id]),
                            'title' => __('template.Administrators'),
                            'subtitle' => __('Manage and view all administrators'),
                            'icon' => asset('assets/icons/group/administrators.svg'),
                        ],
                        [
                            'route' => route('courses.lessons.showLessons', [$program->id, $course->id]),
                            'title' => __('template.Lessons'),
                            'subtitle' => __('Manage and view all lessons'),
                            'icon' => asset('assets/icons/group/lessons.svg'),
                        ],
                    ];
                @endphp
    <x-dynamic-table 
        title="{{ __('template.Students in') }} {{ @$course->name }}"
        routeText="{{ __('template.Student') }} {{ __('template.Add') }}"
        createRoute="{{ '' }}"
        addRoute="{{ route('courses.storeStudentsToCourse', ['course' => $course->id]) }}"
        single="course"
        singleId="{{ $course->id }}"
        searchFor="{{ __('template.students') }}"
        type="students"
        :tabs="$items"
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
                        @php
                            $roleString = \App\Enums\Role::getDescription($user->role);
                        @endphp
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('users.showSpecificUser', ['role' => $roleString, 'user' => $user->id]) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">{{ __('template.View') }}</a>
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