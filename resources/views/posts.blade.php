<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
        <x-post-feature-card :post="$posts->first()"></x-post-feature-card>
        @if($posts->count() >1)
        <div class="lg:grid lg:grid-cols-2">
            @foreach($posts->skip(1) as $post)
                <x-post-card :post="$post"></x-post-card>
                @if($loop->index==1)
                @break
                @endif
            @endforeach
        </div>
        @endif
        @if($posts->count() >3)
        <div class="lg:grid lg:grid-cols-3">
            @foreach($posts->skip(3) as $post)
                <x-post-card :post="$post"></x-post-card>
            @endforeach
        </div>
        @endif
        @else
        <p>Sorry No posts found!</p>
        @endif
    </main>


</x-layout>


