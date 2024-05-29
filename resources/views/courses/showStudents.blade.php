@section('title', __('template.Students') . ' - ' . @$course->name)

<x-app-layout>
    <x-dynamic-table 
        title="{{ __('template.Students in') }} {{ @$course->name }}"
        routeText="{{ __('template.Create') }} {{ __('template.Administrator') }}"
        createRoute="{{ '' }}"
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
                        <a href="" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500">{{ __('View') }}</a>
                        <a href="" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-500 ml-4">{{ __('Edit') }}</a>
                        <form action="" method="POST" class="inline">
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