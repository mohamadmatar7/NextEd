<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 focus:outline-none dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
