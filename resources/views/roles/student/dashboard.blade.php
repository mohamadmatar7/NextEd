@section('title', __('template.Dashboard'))
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-application-logo class="block h-12 w-auto" />
                    </div>

                    <div class="mt-8 text-2xl">
                        {{ __('template.Welcome to your Dashboard!') }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        {{ __('template.From your account dashboard, you can view your recent courses, manage your account details, and more.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
