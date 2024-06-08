<button {{ $attributes->merge(['type' => 'button', 'class' => 'font-medium px-5 py-2.5 mb-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-lg text-sm text-gray-700 dark:text-gray-300 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
