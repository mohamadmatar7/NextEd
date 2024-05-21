<div class="py-8 w-full">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Search bar -->
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                <div class="relative md:w-1/2 mb-4">
                    <input type="text" id="search" name="search"
                        class="border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary placeholder-gray-500 py-2 px-4 block w-full sm:text-sm"
                        placeholder="{{ __('template.Search..') }}">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" stroke="currentColor"
                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table headers -->
                    <thead>
                        <tr>
                            @foreach($headers as $header)
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __($header) }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                        <tr class="user-row">
                            <!-- User data -->
                            @foreach($userRowData as $data)
                            @if ($data == 'courses')
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                @foreach($user->courses as $course)
                                @php
                                $courseName = $course->name;
                                $words = explode(' ', $courseName); // Split the course name into words
                                $abbreviatedName = '';
                                foreach ($words as $word) {
                                $abbreviatedName .= substr($word, 0, 1);
                                }
                                @endphp
                                <span>
                                    {{ $abbreviatedName }}
                                </span>@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            @elseif ($data == 'programs')
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                @foreach($user->courses->pluck('program')->unique() as $program)
                                <span>
                                    {{ $program->name }}
                                </span>
                                @if(!$loop->last), @endif
                                @endforeach
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{
                                $user->$data }}</td>
                            @endif
                            @endforeach
                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <!-- Add actions here -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script>
    jQuery.noConflict();
    jQuery(document).ready(function ($) {
        $('#search').on('input', function () {
            var searchText = $(this).val().toLowerCase();
            $('.user-row').each(function () {
                var rowData = $(this).text().toLowerCase();
                if (rowData.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection