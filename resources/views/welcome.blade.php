@include('document.document-header')

<body class="antialiased">
<div class="container mx-auto">
    <div
        class="relative flex flex-col md:flex-row justify-center min-h-screen bg-dots-darker bg-center bg-gray-50 dark:bg-dots-lighter dark:bg-gray-900 w-full">
        @if (Route::has('login'))

            <!--
        @auth
        <a href="{{ url('/dashboard') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
            __('template.Dashboard') }}</a>
        @else
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
            __('template.Log in') }}</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{
            __('template.Register') }}</a>
        @endif

        @endauth
        -->
        @include('sections.sidebar')

        @include('sections.posts', ['itemType' => 'post', 'id' => 0, 'posts' => $posts])

        @include('sections.aside')

        @endif
    </div>
</div>


    <script>
        // Dropdown button functionality for posts comments and replies
        let dropdownButtons = document.querySelectorAll('[data-dropdown-toggle]');
        dropdownButtons.forEach((button) => {
            button.addEventListener('click', () => {
                button.nextElementSibling.classList.toggle('hidden');
            });
        });
    </script>









</body>

</html>