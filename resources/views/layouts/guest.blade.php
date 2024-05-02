@include('document.document-header')

    <body class="font-sans text-gray-900 antialiased">
        <div class="p-4 min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-auto h-14 fill-current text-gray-500 dark:text-gray-300" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
