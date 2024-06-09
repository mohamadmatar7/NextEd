<div class="mx-auto w-full">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <x-breadcrumb />
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                {{ $title }}
            </h1>
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
                @can('is-admin-or-principal')
                    <a href="{{ $createRoute }}" class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                        {{ $routeText }}
                    </a>
                @endcan
            </div>


            @if(@$addRoute)
                <div class="container mx-auto px-4">
                    <h1 class="text-2xl font-bold mb-4">{{ __('Add Students to Course') }}</h1>

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ $addRoute }}" method="post" class="mb-4">
                        @csrf
                        <div class="mb-4">
                            <label for="student-search" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Search Students') }}</label>
                            <div class="relative">
                                <input type="text" id="student-search" class="form-input mt-1 block w-full" placeholder="Search for students...">
                                <div id="results" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto hidden"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="students" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Selected Students') }}</label>
                            <div id="selected-students" class="flex flex-wrap gap-2">
                                <!-- Selected students will be displayed here -->
                            </div>
                            <input type="hidden" id="students" name="students[]">
                            <input type="hidden" name="course" value="{{ $courseId }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Add Students') }}
                            </button>
                        </div>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const searchInput = document.getElementById('student-search');
                        const resultsDiv = document.getElementById('results');
                        const selectedStudentsDiv = document.getElementById('selected-students');
                        const studentsInput = document.getElementById('students');
                        let selectedStudents = [];

                        searchInput.addEventListener('input', function () {
                            const search = this.value;
                            const url = `?search=${encodeURIComponent(search)}`;

                            fetch(url, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok ' + response.statusText);
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    // Clear previous results
                                    resultsDiv.innerHTML = '';
                                    data.forEach(user => {
                                        const option = document.createElement('div');
                                        option.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-200');
                                        option.textContent = user.text;
                                        option.dataset.id = user.id;

                                        option.addEventListener('click', () => {
                                            if (!selectedStudents.includes(user.id)) {
                                                selectedStudents.push(user.id);
                                                updateSelectedStudents(user);
                                            }
                                            searchInput.value = '';
                                            resultsDiv.innerHTML = '';
                                            resultsDiv.classList.add('hidden');
                                        });

                                        resultsDiv.appendChild(option);
                                    });

                                    resultsDiv.classList.remove('hidden');
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        });

                        function updateSelectedStudents(user) {
                            const studentDiv = document.createElement('div');
                            studentDiv.classList.add('bg-blue-500', 'text-white', 'px-3', 'py-1', 'rounded', 'flex', 'items-center');
                            studentDiv.textContent = user.text;
                            const removeBtn = document.createElement('button');
                            removeBtn.classList.add('ml-2', 'text-xs', 'text-red-500');
                            removeBtn.textContent = 'x';
                            removeBtn.addEventListener('click', () => {
                                selectedStudents = selectedStudents.filter(sid => sid !== user.id);
                                studentDiv.remove();
                                updateHiddenInput();
                            });
                            studentDiv.appendChild(removeBtn);
                            selectedStudentsDiv.appendChild(studentDiv);
                            updateHiddenInput();
                        }

                        function updateHiddenInput() {
                            studentsInput.value = selectedStudents.join(',');
                        }

                        document.addEventListener('click', function (e) {
                            if (!resultsDiv.contains(e.target) && e.target !== searchInput) {
                                resultsDiv.classList.add('hidden');
                            }
                        });
                    });
                </script>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r">
                            @foreach($tableHeaders as $header)
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        {{ $tableRows }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
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
