@section('title', __('template.Categories') . ' - ' . $category->name)

<x-app-layout>

    <x-dynamic-table
                    title="{{ __('template.Programs in') }} {{ $category->name }}"
                    routeText="{{ __('template.Program') }} {{ __('template.Create') }}"
                    createRoute="{{ route('programs.create') }}"
                    :tableHeaders="[
                        __('template.Name'),
                        __('template.Years'),
                        __('template.Courses'),
                        __('template.Lessons'),
                        __('template.Students'),
                        __('template.Actions')
                    ]">
        @slot('tableRows')
            @foreach($category->programs as $program)
                <tr class="search-row">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300 program-name">{{ $program->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 program-years">{{ $program->years }} {{ __('template.Years') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 program-courses-count">{{ $program->courses->count() }} {{ __('template.Courses') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 program-lessons-count">{{ $program->courses->map(function($course) { return $course->lessons->count(); })->sum() }} {{ __('template.Lessons') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 program-users-count">{{ $program->courses->map(function($course) { return $course->users->where('role', 0)->count(); })->sum() }} {{ __('template.Students') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('programs.show', $program) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">{{ __('View') }}</a>
                        <a href="{{ route('programs.edit', $program) }}" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-500 ml-4">{{ __('Edit') }}</a>
                        <form action="{{ route('programs.destroy', $program) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-500 ml-4">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    </x-dynamic-table>

</x-app-layout>