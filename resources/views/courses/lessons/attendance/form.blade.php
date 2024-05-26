
@section('title', __('template.Attendance') . ' - ' . $lesson->name)

<x-app-layout>
<div class="mx-auto w-full">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-8 h-full">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                Attendance for {{ $lesson->name }}
            </h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <form action="{{ route('attendance.submit', $lesson->id) }}" method="POST">
                    @csrf
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r">
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                    Student
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                    Reason (if absent with reason)
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($students as $student)
                                @php
                                    $attendance = $attendances->get($student->id);
                                @endphp
                                <tr class="search-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $student->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <select name="attendance[{{ $student->id }}][status]" class="form-control" required>
                                            <option value="0" {{ $attendance && $attendance->status == 0 ? 'selected' : '' }}>Present</option>
                                            <option value="1" {{ $attendance && $attendance->status == 1 ? 'selected' : '' }}>Absent</option>
                                            <option value="2" {{ $attendance && $attendance->status == 2 ? 'selected' : '' }}>Absent with reason</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="text" name="attendance[{{ $student->id }}][reason]" class="form-control" value="{{ $attendance && $attendance->status == 2 ? $attendance->reason : '' }}" {{ $attendance && $attendance->status == 2 ? '' : 'disabled' }}>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                            Submit
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
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            select.addEventListener('change', function () {
                const reasonInput = this.closest('tr').querySelector('input[name*="[reason]"]');
                if (this.value == '2') {
                    reasonInput.removeAttribute('disabled');
                } else {
                    reasonInput.setAttribute('disabled', 'disabled');
                    reasonInput.value = '';
                }
            });

            // Initial load: enable/disable reason field based on current value
            const reasonInput = select.closest('tr').querySelector('input[name*="[reason]"]');
            if (select.value == '2') {
                reasonInput.removeAttribute('disabled');
            } else {
                reasonInput.setAttribute('disabled', 'disabled');
                reasonInput.value = '';
            }
        });
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
</x-app-layout>
