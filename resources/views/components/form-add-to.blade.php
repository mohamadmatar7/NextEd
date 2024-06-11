<form action="{{ $addRoute }}" method="post" class="mb-4 w-[50%] hidden ml-auto" id="add-form">
    @csrf
    <div class="mb-4">
        <div class="relative">
            <input type="text" id="student-search"
                class="form-input mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary placeholder-gray-500 py-2 px-4 block w-full sm:text-sm"
                placeholder="{{ __('template.Search for') }} {{ $searchFor }}">
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" stroke="currentColor"
                    viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                    </path>
                </svg>
            </div>
            <div id="results"
                class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto hidden">
            </div>
        </div>
    </div>
    <div class="mb-4">
        <label for="{{ $type }}" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Selected')
            }} {{ $searchFor }}</label>
        <ul id="selected-{{ $type }}" class="flex flex-wrap gap-2">
            <!-- Selected {{ $type }} will be displayed here -->
            <input type="hidden" name="course" value="{{ $courseId }}">
        </ul>
    </div>
    <div class="flex justify-end">
        <button type="submit"
            class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:shadow-outline">
            {{ __('template.Add') }}
        </button>
    </div>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('student-search');
        const resultsDiv = document.getElementById('results');
        const selectedStudentsDiv = document.getElementById('selected-{{ $type }}');
        const studentsInput = document.getElementById('{{ $type }}');
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
            // studentsInput.value = selectedStudents.join(',');
                    // Remove existing hidden inputs
            const existingInputs = form.querySelectorAll('input[name="{{ $type }}[]"]');
            existingInputs.forEach(input => input.remove());

            // Add new hidden inputs
            selectedStudents.forEach(studentId => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '{{ $type }}[]';
                input.value = studentId;
                form.appendChild(input);
            });
        }

        document.addEventListener('click', function (e) {
            if (!resultsDiv.contains(e.target) && e.target !== searchInput) {
                resultsDiv.classList.add('hidden');
            }
        });

        // Add button toggle form visibility, toggle icon and text
        const addBtn = document.getElementById('add-btn');
        const form = document.getElementById('add-form');
        const svgIcon = addBtn.querySelector('svg');
        const spanText = addBtn.querySelector('span');
        addBtn.addEventListener('click', () => {
            form.classList.toggle('hidden');
            const isFormHidden = form.classList.contains('hidden');
            svgIcon.classList.toggle('hidden', isFormHidden);
            spanText.classList.toggle('hidden', !isFormHidden);
        });
    });
</script>