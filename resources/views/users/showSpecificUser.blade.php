@section('title', __('template.Users') . ' - ' . $user->name)

<x-app-layout>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
                <x-breadcrumb />
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-48 flex items-center justify-center rounded-ss-lg rounded-se-lg">
                    <div class="relative">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                 class="rounded-full w-32 h-32 border-4 border-white object-cover">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gray-300 flex items-center justify-center text-white text-4xl">
                                {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 bg-green-500 w-8 h-8 rounded-full border-2 border-white">
                        </div> <!-- Online status indicator -->
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-8">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $user->first_name }} {{ $user->last_name }}</h1>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $user->role == 0 ? 'Student' : ($user->role == 1 ? 'Teacher' : ($user->role == 2 ? 'Instructor' : ($user->role == 3 ? 'Principal' : 'Admin'))) }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Contact -->
                        <div>
                            <h2 class="text-gray-800 dark:text-gray-200 font-semibold mb-2 text-xl">Contact</h2>
                            <p class="text-gray-600 dark:text-gray-400 break-all"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                        </div>

                        <!-- Profile -->
                        <div>
                            <h2 class="text-gray-800 dark:text-gray-200 font-semibold mb-2 text-xl">Profile</h2>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Username:</strong> {{ $user->name }}</p>

                            <p class="text-gray-600 dark:text-gray-400"><strong>Joined:</strong> {{ $user->created_at->format('F j, Y') }}</p>
                            @if ($user->email_verified_at)
                                <p class="text-gray-600 dark:text-gray-400"><strong>Email Verified:</strong> {{ $user->email_verified_at->format('F j, Y') }}</p>
                            @else
                                <p class="text-gray-600 dark:text-gray-400"><strong>Email Verified:</strong> Not Verified</p>
                            @endif
                        </div>

                        <!-- Program -->
                        <div>
                            <h2 class="text-gray-800 dark:text-gray-200 font-semibold mb-2 text-xl">Program</h2>
                            <p class="text-gray-600 dark:text-gray-400"><strong>Programs:</strong> {{ $user->courses->pluck('program')->unique()->implode('name', ', ') }}</p>
                        </div>

                        <!-- Course -->
                        <div class="mb-4">
                            <h2 class="text-gray-800 dark:text-gray-200 font-semibold mb-2 text-xl">Courses:</h2>
                            <ul class="text-gray-600 dark:text-gray-400 list-decimal pl-4">
                                @foreach($user->courses->unique() as $course)
                                    <li>
                                        <a href="{{ route('courses.show', ['program' => $course->program, 'course' => $course]) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:underline text-base">
                                            {{ $course->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @can('is-admin-or-principal')
                            <!-- add courses to user -->
                             <div class="mt-4 flex flex-col justify-end">
                                <strong class="w-fit inline-flex md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 cursor-pointer" id="add-btn">
                                    <span>{{ __('template.Courses') }} {{ __('template.Add') }}</span>
                                    <svg class="h-5 w-full hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </strong>
                                <x-form-add-to :searchFor="__('template.courses')" type="courses" addRoute="{{ route('users.storeCoursesToUser', ['user' => $user->id]) }}" single="user" singleId="{{ $user->id }}" />
                            </div>
                            @endcan
                        </div>
                    </div>

                    <div class="my-5 flex flex-wrap md:inline-flex justify-between gap-2 w-full lg:w-[95%] items-start">
                        <!-- Edit Profile Button -->
                        @if (Auth::user()->id == $user->id)
                            <a href="" class="md:text-sm lg:text-base text-white font-bold p-2 sm:py-2 sm:px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900">
                                {{ __('template.Profile') }} {{ __('template.Edit') }}
                            </a>
                        @endif


                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
