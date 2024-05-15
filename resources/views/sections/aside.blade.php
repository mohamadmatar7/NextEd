<div class="md:w-2/6 relative">
    <!--Aside menu (right side)-->
    <div class="py-6 px-4 sm:sticky sm:top-0 bg-white dark:bg-gray-800 max-h-svh">
        <!--Announcements specific section-->
        <x-announcement :Items="$announcementsPrograms" loopTitle="{{ __('template.Program Announcements') }}" />

        <hr class="mt-8">

        <!--Announcements general-->
        <x-announcement :Items="$announcements" loopTitle="{{ __('template.General Announcements') }}" />

    </div>
</div>

<style>
    .overflow-y-aside {
        overflow-y: hidden;
    }

    .overflow-y-aside:hover {
        overflow-y: auto;
    }

    .overflow-y-aside::-webkit-scrollbar {
        width: 6px; 
    }

    .overflow-y-aside::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2); 
        border-radius: 3px; 
    }

    .overflow-y-aside::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.4); 
    }
</style>
