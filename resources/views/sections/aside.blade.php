<div class="md:w-2/6 relative">
    <!--Aside menu (right side)-->
    <div class="py-6 px-4 sm:sticky sm:top-0 sm:right-0 bg-white dark:bg-gray-800 max-h-svh">

        <!--Announcements specific section-->
        <div class="flex flex-col mb-6" style="max-height: 45vh;">
            <div class="flex">
                    <h3 class="px-4 py-4 text-3xl font-extrabold dark:text-white">{{ __('template.Program Announcements') }}</h3>
            </div>
            <div class="overflow-y-aside flex flex-col mt-4">
                @foreach($announcementsPrograms as $announcement)
                    <x-announcement :itemTitle="$announcement->title" :itemDate="$announcement->created_at->format('F d, Y')" :itemBody="$announcement->body" :itemImage="$announcement->image" :itemUserName="$announcement->user->name" />
                @endforeach
            </div>
        </div>

        <!--Announcements general section-->
        <div class="flex flex-col" style="max-height: 45vh;">
            <div class="flex">
                    <h3 class="px-4 py-4 text-3xl font-extrabold dark:text-white">{{ __('template.General Announcements') }}</h3>
            </div>
            <div class="overflow-y-aside flex flex-col mt-4">
                @foreach($announcements as $announcement)
                    <x-announcement :itemTitle="$announcement->title" :itemDate="$announcement->created_at->format('F d, Y')" :itemBody="$announcement->body" :itemImage="$announcement->image" :itemUserName="$announcement->user->name" />
                @endforeach
            </div>
        </div>
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
