<x-layout.layout>
    {{--TODO::RENAME $POSTS -> PAGINATOR--}}
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts.posts-grid :posts="$posts"></x-posts.posts-grid>
            {{$posts->links()}}
        @else
            <p>Sorry No posts found!</p>
        @endif
    </main>
</x-layout.layout>
