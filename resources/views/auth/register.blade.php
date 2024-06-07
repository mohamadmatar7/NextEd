@section('title', 'Register')
<x-app-layout>
    <div class="mx-auto w-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
            <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
                <x-breadcrumb />
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    {{ __('template.Register') }}
                </h1>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- First Name -->
                    <div class="flex flex-col gap-y-4 lg:gap-y-0 lg:flex-row w-full lg:justify-between">
                        <div class="flex flex-col lg:w-[49%]">
                            <div>
                                <x-input-label for="first_name" :value="__('template.First Name')" />
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                    :value="old('first_name')" required autofocus autocomplete="first_name" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- Last Name -->
                            <div class="mt-4">
                                <x-input-label for="last_name" :value="__('template.Last Name')" />
                                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                    :value="old('last_name')" required autocomplete="last_name" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>

                            <!-- Name -->
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('template.Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('template.Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username"
                                    title="{{ __('template.Please enter a valid email address with the following format: example@nexted.school') }}"
                                    />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Role -->
                            <div class="mt-4">
                                <x-input-label for="role" :value="__('template.Role')" />
                                <x-select id="role" class="block mt-1 w-full" name="role" required>
                                    <option value="0" selected>{{ __('template.Select.student') }}</option>
                                    <option value="1">{{ __('template.Select.teacher') }}</option>
                                    <option value="2">{{ __('template.Select.instructor') }}</option>
                                    <option value="3">{{ __('template.Select.principal') }}</option>
                                    <option value="4">{{ __('template.Select.admin') }}</option>
                                </x-select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('template.Password')" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('template.Confirm Password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Profile Avatar -->
                            <div class="mt-4">
                                <x-input-label for="avatar" :value="__('template.Avatar')" />
                                <x-file-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
                                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                            </div>

                        </div>


                        <div class="flex flex-col lg:w-[49%]">
                            <!-- Father Name -->
                            <div>
                                <x-input-label for="father_name" :value="__('template.Father Name')" />
                                <x-text-input id="father_name" class="block mt-1 w-full" type="text" name="father_name"
                                    :value="old('father_name')"  autofocus autocomplete="father_name" />
                                <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
                            </div>

                            <!-- Mother Name -->
                            <div class="mt-4">
                                <x-input-label for="mother_name" :value="__('template.Mother Name')" />
                                <x-text-input id="mother_name" class="block mt-1 w-full" type="text" name="mother_name"
                                    :value="old('mother_name')" required autofocus autocomplete="mother_name" />
                                <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
                            </div>

                            <!-- Nationality -->
                            <div class="mt-4">
                                <x-input-label for="nationality" :value="__('template.Nationality')" />
                                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality"
                                    :value="old('nationality')" required autofocus autocomplete="nationality" />
                                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="dob" :value="__('template.Date of Birth')" />
                                <x-date-input id="dob" class="block mt-1 w-full" type="date" name="dob"
                                    :value="old('dob')" required autofocus autocomplete="dob"
                                    :max="now()->subYears(16)->format('Y-m-d')" />
                                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('template.Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    :value="old('phone')" required autofocus autocomplete="phone"
                                    pattern="^(\+32|0)\d{9}$" title="{{ __('template.Please enter a valid Belgian phone number starting with +32 or 0 followed by 9 digits.') }}" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            
                            <!-- Emergency Phone -->
                            <div class="mt-4">
                                <x-input-label for="emergency_phone" :value="__('template.Emergency Phone')" />
                                <x-text-input id="emergency_phone" class="block mt-1 w-full" type="text" name="emergency_phone"
                                    :value="old('emergency_phone')"  autofocus autocomplete="emergency_phone"
                                    pattern="^(\+32|0)\d{9}$" title="{{ __('template.Please enter a valid Belgian phone number starting with +32 or 0 followed by 9 digits.') }}" />
                                <x-input-error :messages="$errors->get('emergency_phone')" class="mt-2" />
                            </div>

                            <!-- Address -->
                            <div class="mt-4">
                                <x-input-label for="address" :value="__('template.Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                    :value="old('address')" required autofocus autocomplete="address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <!-- gender -->
                            <div class="mt-4">
                                <x-input-label for="gender" :value="__('template.Gender')" />
                                <x-select id="gender" class="block mt-1 w-full" name="gender" required>
                                    <option value="Female" selected>{{ __('template.Gender Select.Female') }}</option>
                                    <option value="Male">{{ __('template.Gender Select.Male') }}</option>
                                    <option value="Other">{{ __('template.Gender Select.Other') }}</option>
                                </x-select>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center justify-end mt-6">
                        <!--
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('template.Already registered?') }}
                        </a>
                        -->
                        
                        <x-primary-button class="ms-4 text-lg">
                            {{ __('template.Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>