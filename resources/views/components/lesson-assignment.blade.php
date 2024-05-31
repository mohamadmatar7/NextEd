<!-- resources/views/components/content-card.blade.php -->

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl w-full lg:py-2 h-full">
    <div class="py-6 px-4 sm:px-10 bg-white dark:bg-gray-800">
        <x-breadcrumb />
        <div class="flex flex-col lg:flex-row justify-between gap-y-3 mb-6 items-baseline">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                {{ $title }}
            </h2>
            @if ($adminLink && $adminText)
                <a href="{{ $adminLink }}"
                class="text-white font-bold py-2 px-4 rounded bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 max-w-fit">
                    {{ $adminText }}
                </a>
            @endif
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <div>
                <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('Description') }}:</span>
                <div class="text-gray-900 dark:text-gray-100">{{ $description }}</div>
            </div>
            @foreach ($details as $label => $value)
                <div>
                    <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ $label }}:</span>
                    <div class="text-gray-900 dark:text-gray-100">{{ $value }}</div>
                </div>
            @endforeach
        </div>
        @if ($notes)
            <div class="col-span-1 sm:col-span-2">
                <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('Notes') }}:</span>
                <div class="text-gray-900 dark:text-gray-100">{{ $notes }}</div>
            </div>
        @endif
        @if ($attachments)
            <div class="mb-6">
                <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('Attachments') }}:</span>
                <div class="mt-2">
                    <ul class="list-disc list-inside">
                        @foreach ($attachments as $attachment)
                            <li>
                                <a href="{{ $attachment['url'] }}" class="text-blue-500 dark:text-blue-400 hover:underline">
                                    {{ $attachment['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if ($videoUrl)
            <div class="mb-6">
                <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ __('Video') }}:</span>
                <div class="mt-2">
                    <video class="w-full rounded-lg border border-gray-300 dark:border-gray-700" controls>
                        <source src="{{ $videoUrl }}" type="video/mp4">
                        {{ __('Your browser does not support the video tag.') }}
                    </video>
                </div>
            </div>
        @endif
    </div>
</div>
