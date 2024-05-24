@section('title', 'Forbidden')

<x-app-layout>

    <div class="mx-auto w-full">
        <div class="flex items-center justify-center py-14 lg:p-0 lg:min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden p-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ __("template.403 Forbidden") }}
                    </h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                        {{ __("template.You don't have permission to access this page.") }}
                    </p>
                    <a href="{{ url('/') }}" class="inline-block px-6 py-3 text-sm font-medium bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 text-white rounded-md">
                        {{ __("template.Back to Homepage") }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>