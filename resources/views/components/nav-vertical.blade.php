<nav id="draggable-nav" class="fixed top-1/3 right-1 w-fit cursor-move z-50" aria-label="Vertical Navigation">
  <div id="drag-handle" class="flex items-center justify-center bg-gray-50 hover:bg-gray-200 rounded-se-lg  rounded-ss-lg cursor-move py-1" title="move me">
    <img src="{{ asset('assets/icons/cursor/move.svg?') }}" class="h-5 w-5 md:h-7 md:w-7" alt="Vertical Navigation">
  </div>
  <ul class="flex flex-col items-center justify-center w-full font-medium border border-gray-100 rounded-ee-lg rounded-es-lg bg-gray-50 bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900">
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800  transition duration-200" title="{{ __('template.Assignments') }}">
        <img src="{{ asset('assets/icons/group/assignments.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Assignments') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Assignments') }}</span>
      </a>
    </li>
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800 rounded transition duration-200" title="{{ __('template.Announcements') }}">
        <img src="{{ asset('assets/icons/group/announcements.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Announcements') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Announcements') }}</span>
      </a>
    </li>
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800 rounded transition duration-200" title="{{ __('template.Lessons') }}">
        <img src="{{ asset('assets/icons/group/lessons.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Lessons') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Lessons') }}</span>
      </a>
    </li>
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800 rounded transition duration-200" title="{{ __('template.Attendance') }}">
        <img src="{{ asset('assets/icons/group/attendance.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Attendance') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Attendance') }}</span>
      </a>
    </li>
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800 rounded transition duration-200" title="{{ __('template.Students') }}">
        <img src="{{ asset('assets/icons/group/users.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Students') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Students') }}</span>
      </a>
    </li>
    <li class="relative group">
      <a href="#" class="inline-flex py-1.5 px-2 md:p-2 hover:bg-blue-600 dark:hover:bg-gray-800 rounded-ee-lg rounded-es-lg transition duration-200" title="{{ __('template.Administrators') }}">
        <img src="{{ asset('assets/icons/group/administrators.svg') }}" class="h-5 w-5 md:h-7 md:w-7" alt="{{ __('template.Administrators') }}">
        <span class="absolute right-full ml-2 px-2 py-1 text-white bg-blue-700 dark:bg-gray-800 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transform transition duration-200">{{ __('template.Administrators') }}</span>
      </a>
    </li>
  </ul>
</nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  // Use jQuery's noConflict() method to avoid conflicts
  $.noConflict();
  jQuery(function($) {
    $('#draggable-nav').draggable({
      handle: '#drag-handle'
    });
  });
</script>


