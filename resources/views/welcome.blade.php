<x-app-layout>

@include('sections.posts', ['itemType' => 'post', 'id' => 0, 'posts' => $posts])

@include('sections.aside')

</x-app-layout>