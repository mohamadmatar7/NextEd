@section('title', __('template.Attendance') . ' - ' . $lesson->name)

<x-app-layout>
    <div class="mx-auto w-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
                <x-breadcrumb />
                <div class="flex flex-col mb-6 gap-y-3">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        {{ __('template.Attendance') }} - {{ $lesson->name }}
                    </h2>
                    <strong class="text-gray-500 dark:text-gray-400">{{ __('template.Lesson Fields.Start Time') }}: {{ \Carbon\Carbon::parse($lesson->start_time)->format('F j, Y, g:i a') }}</strong>
                </div>

                @if (session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Search Box -->
                <div class="relative mb-4 w-2/3 md:w-1/2 lg:w-1/3">
                    <input type="text" id="search" name="search" class="border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary placeholder-gray-500 py-2 px-4 block w-full sm:text-sm" placeholder="{{ __('template.Search..') }}">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" stroke="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Attendance Form -->
                <div class="overflow-x-auto">
                    <form action="{{ route('attendance.submit', ['program' => $program->id, 'course' => $course->id, 'lessonId' => $lesson->id]) }}" method="POST">
                        @csrf
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Student') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                        {{ __('template.Status') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        {{ __('template.Reason') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($students as $student)
                                    @php
                                        $attendance = $attendances->get($student->id);
                                    @endphp
                                    <tr class="search-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $student->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select name="attendance[{{ $student->id }}][status]" class="form-select mt-1 block w-full attendance-status" required>
                                                <option value="0" {{ $attendance && $attendance->status == 0 ? 'selected' : '' }}>Present</option>
                                                <option value="1" {{ $attendance && $attendance->status == 1 ? 'selected' : '' }}>Absent</option>
                                                <option value="2" {{ $attendance && $attendance->status == 2 ? 'selected' : '' }}>Absent with reason</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" name="attendance[{{ $student->id }}][reason]" class="form-input mt-1 block w-full disabled-input" value="{{ $attendance && $attendance->status == 2 ? $attendance->reason : '' }}" {{ $attendance && $attendance->status == 2 ? '' : 'disabled' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="text-white font-bold py-2 px-6 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                                {{ __('template.Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('.attendance-status');
            selects.forEach(select => {
                select.addEventListener('change', function () {
                    const reasonInput = this.closest('tr').querySelector('input[name*="[reason]"]');
                    if (this.value == '2') {
                        reasonInput.removeAttribute('disabled');
                        reasonInput.classList.remove('disabled-input');
                    } else {
                        reasonInput.setAttribute('disabled', 'disabled');
                        reasonInput.classList.add('disabled-input');
                        reasonInput.value = '';
                    }
                });

                // Initial load: enable/disable reason field based on current value
                const reasonInput = select.closest('tr').querySelector('input[name*="[reason]"]');
                if (select.value == '2') {
                    reasonInput.removeAttribute('disabled');
                    reasonInput.classList.remove('disabled-input');
                } else {
                    reasonInput.setAttribute('disabled', 'disabled');
                    reasonInput.classList.add('disabled-input');
                    reasonInput.value = '';
                }

                // Set background color based on the selected value
                setBackgroundColor(select);
                select.addEventListener('change', function () {
                    setBackgroundColor(select);
                });
            });

            function setBackgroundColor(select) {
                if (select.value == '0') {
                    select.classList.add('bg-green-100', 'dark:bg-green-600');
                    select.classList.remove('bg-red-100', 'bg-yellow-100', 'dark:bg-red-600', 'dark:bg-yellow-600');
                } else if (select.value == '1') {
                    select.classList.add('bg-red-100', 'dark:bg-red-600');
                    select.classList.remove('bg-green-100', 'bg-yellow-100', 'dark:bg-green-600', 'dark:bg-yellow-600');
                } else if (select.value == '2') {
                    select.classList.add('bg-yellow-100', 'dark:bg-yellow-600');
                    select.classList.remove('bg-green-100', 'bg-red-100', 'dark:bg-green-600', 'dark:bg-red-600');
                }
            }
        });

        // Search functionality
        const search = document.getElementById('search');
        const searchRows = document.querySelectorAll('.search-row');
        search.addEventListener('keyup', (e) => {
            const searchString = e.target.value.toLowerCase();
            searchRows.forEach((row) => {
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

    <style>
        .disabled-input {
            background-color: #d1d5db;
            cursor: not-allowed;
        }
    </style>
</x-app-layout>
