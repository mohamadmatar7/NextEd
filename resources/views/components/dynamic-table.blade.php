<div class="mx-auto w-full">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
        <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
            <x-breadcrumb />
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                {{ $title }}
            </h1>
            <div class="flex justify-between items-baseline mb-4">
                <div class="relative w-1/2 mb-4">
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
                @can('is-admin-or-principal')
                    @if(!@$addRoute)
                        <a href="{{ $createRoute }}"
                            class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                            {{ $routeText }}
                        </a>
                    @else
                        <strong class="inline-flex md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 cursor-pointer" id="add-btn">
                            <span>{{ $routeText }}</span>
                            <svg class="h-5 w-full hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </strong>
                    @endif
                @endcan
            </div>

            @if(@$addRoute)
                <x-form-add-to :searchFor="$searchFor" :type="$type" :addRoute="$addRoute" :single="$single" :singleId="$singleId" :left="true" />
            @endif

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r">
                            @foreach($tableHeaders as $header)
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider border-r border-gray-50 dark:border-gray-100">
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