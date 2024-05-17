@include('document.document-header')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="xl:container mx-auto px-2">
                <div
                    class="relative flex flex-col md:flex-row justify-center min-h-screen bg-dots-darker bg-center bg-gray-50 dark:bg-dots-lighter dark:bg-gray-900 w-full">

            <!-- Page Heading -->
            @include('sections.sidebar')

            <!-- Page Content -->
            <main class="relative flex flex-col md:flex-row w-full md:w-10/12 lg:w-[87.1%]">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
