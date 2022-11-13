<x-layout>
    <h1>Welcome!</h1>
    <p class="mb-5">{{count($posts)}} posts to read!</p>
    @foreach($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->id}}">
                    {{$post->title}}
                </a>
            </h1>
            <div>
                <p>
                {{$post->summary}}
                </p>
            </div>
        </article>
    @endforeach
</x-layout>


