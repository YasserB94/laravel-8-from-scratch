<x-layout>
    <h1>Welcome!</h1>
    <p class="mb-5">{{count($posts)}} posts to read!</p>
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        @foreach($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-layout>


