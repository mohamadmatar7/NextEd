@section('title', __('template.Roles'))

<x-app-layout>

<div class="py-8 w-full">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    {{ __('User Roles') }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($roles as $role)
                        <a href="{{ route('users.showByRole', ['role' => $role['name']]) }}"
                            class="group relative block p-6 bg-gradient-to-r from-blue-500 to-blue-700 dark:bg-gradient-to-r dark:from-gray-700 dark:to-gray-900 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1">
                                        <div class="text-xl font-medium text-white group-hover:text-yellow-300 transition duration-300">{{ $role['name'] }}</div>
                                        <p class="text-gray-100 group-hover:text-yellow-100 transition duration-300">{{ __('Users: ') . $role['user_count'] }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/icons/user/' . strtolower($role['name']) . '.svg') }}" alt="{{ $role['name'] }} icon" class="h-12 w-12 text-white group-hover:text-yellow-300 transition duration-300">
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>