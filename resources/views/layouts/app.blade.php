@include('document.document-header')
    <body class="font-sans antialiased">
        <div class="min-h-screen ">
            <div class="px-2">
                <div
                    class="2xl:container mx-auto relative flex flex-col md:flex-row justify-center min-h-screen bg-dots-darker bg-center bg-gray-50 dark:bg-dots-lighter dark:bg-gray-900 w-full">

            <!-- Page Heading -->
            @include('sections.sidebar')

            <!-- Page Content -->
            <main class="relative flex flex-col md:flex-row w-full md:w-10/12 lg:w-[87.1%] min-h-screen">
                {{ @$slot }}
            </main>
            <x-ai-chat />
        </div>
        @yield('scripts')
    </body>
</html>
