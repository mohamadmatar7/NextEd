@section('title', __('template.Roles') . ' - ' . $role)


<x-app-layout>


    <div class="py-8 w-full">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                        {{ __('template.Users with role') }} {{ $role }}
                    </h2>
                    <div class="flex justify-between items-baseline mb-4">
                        <div class="relative w-1/2 mb-4">
                            <input type="text" id="search" name="search" class="border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary placeholder-gray-500 py-2 px-4 block w-full sm:text-sm" placeholder="{{ __('template.Search..') }}">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" stroke="currentColor"
                                    viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="" class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                            {{ $role.' '. __('template.Create') }}
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr class="bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Name') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Email') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Role') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Courses') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Programs') }}
                                    </th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('template.Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($users as $user)
                                <tr class="user-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300 user-name">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 user-email">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 user-courses">
                                        @foreach($user->courses as $course)
                                            @php
                                                $courseName = $course->name;
                                                $words = explode(' ', $courseName); // Split the course name into words
                                                $abbreviatedName = '';
                                                foreach ($words as $word) {
                                                    $abbreviatedName .= substr($word, 0, 1);
                                                }
                                            @endphp
                                            <span>{{ $abbreviatedName }}</span>@if(!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 user-programs">
                                        @foreach($user->courses->pluck('program')->unique() as $program)
                                            <span>{{ $program->name }}</span>@if(!$loop->last), @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            const search = document.getElementById('search');
            const userRows = document.querySelectorAll('.user-row');
            search.addEventListener('keyup', (e) => {
                const searchString = e.target.value.toLowerCase();
                userRows.forEach((row) => {
                    const rowData = row.textContent.toLowerCase();
                    if (rowData.includes(searchString)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>







