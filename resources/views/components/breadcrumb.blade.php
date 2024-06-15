<nav class="flex mb-4" aria-label="Breadcrumb">
  <ol class="flex flex-wrap items-center space-x-1 gap-y-1 rtl:space-x-reverse">
    <!-- Home breadcrumb -->
    <li class="inline-flex items-center">
      <a href="{{ url('/') }}" class="inline-flex items-center text-sm lg:text-base font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Home
      </a>
    </li>

    @foreach ($segments as $index => $breadcrumb)
      @if ($index < count($segments) - 1)
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{ $breadcrumb['url'] }}" class="test ms-1 text-sm lg:text-base font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"
              title="{{ $breadcrumb['name'] }}"
              >{{ $breadcrumb['name'] }}</a>
          </div>
        </li>
      @else
        <!-- Current page breadcrumb -->
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm lg:text-base font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $breadcrumb['name'] }}</span>
          </div>
        </li>
      @endif
    @endforeach
  </ol>
</nav>



<script>
const breadcrumbItems = document.querySelectorAll('.test');
breadcrumbItems.forEach(item => {
  if (item.textContent.length > 15) {
    item.textContent = item.textContent.substring(0, 13) + '...';
  }
});
</script>