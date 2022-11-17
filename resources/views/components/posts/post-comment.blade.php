@props(['comment'])
<article {{ $attributes->class([]) }}>
    <x-layout.panel class="bg-gray-100">
    <header >
        <a class="flex space-x-2" href="/?author={{$comment->author->username}}">
        <img class="rounded-xl max-h-16 aspect-square shadow-xl" src="https://i.pravatar.cc/100?u={{$comment->author->id}}" alt="User avatar">
        <h3 class="text-xl text-blue-500 mt-auto">{{$comment->author->username}}</h3>
        </a>
    </header>
    <main class="mt-2 ml-8">
        <p>{{$comment->body}}</p>
    </main>
    <footer class="text-right text-xs text-gray-500">
        <time>{{$comment->created_at->diffForHumans()}}</time>
    </footer>
    </x-layout.panel>
</article>
