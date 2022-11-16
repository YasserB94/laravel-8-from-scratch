@props(['comment'])
<article {{ $attributes->class(['p-4 rounded  bg-gray-100 border border-gray-200 hover:border-l-blue-500']) }}>
    <header class="flex  space-x-2">
        <img class="rounded-xl max-h-16 aspect-square shadow-xl" src="https://i.pravatar.cc/100?u={{$comment->id}}" alt="User avatar">
        <h3 class="text-xl text-blue-500 mt-auto">{{$comment->author->username}}</h3>
    </header>
    <main class="mt-2 ml-8">
        <p>{{$comment->body}}</p>
    </main>
    <footer class="text-right text-xs text-gray-500">
        <time>{{$comment->created_at}}</time>
    </footer>
</article>
