
@section('title', __('template.Posts'))


<x-app-layout>

    @include('sections.posts', ['itemType' => 'post', 'id' => 0, 'posts' => $posts, 'loadMore' => true])

</x-app-layout>