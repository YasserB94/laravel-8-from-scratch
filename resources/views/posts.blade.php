<x-layout>
    <h1>Welcome!</h1>
    <p class="mb-5">{{count($posts)}} posts to read!</p>
    @foreach($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
            <p> By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a
                    href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            <div>
                <p>
                    {{$post->summary}}
                </p>
            </div>
        </article>
    @endforeach
</x-layout>


