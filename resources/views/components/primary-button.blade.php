<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-primary hover:bg-primaryDark focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
