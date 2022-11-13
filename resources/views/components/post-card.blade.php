<article class="max-w-lg flex h-full mx-auto">
                <div
                    class=" bg-slate-200 text-slate-900 shadow-md shadow-slate-700 border border-slate-500 rounded-lg"
                >
                    <a  href="/posts/{{$post->slug}}">
                        <img class="rounded-t-lg" src="https://picsum.photos/600/300" alt="">
                    </a>
                    <div class="p-5">
                        <h5 class="text-gray-900 font-bold tracking-tight h-12">
                        <a class="no-underline" href="/posts/{{$post->slug}}">
{{$post->title}}
</a>
</h5>
<p class="text-sm">by: <a
        href="/authors/{{$post->author->username}}">{{$post->author->name}}</a></p>
<p class="font-normal text-gray-700 h-8 mt-4 mb-6">{{$post->summary}}</p>
<div class="flex justify-between">
    <a class="block mt-auto text-sm w-1/2" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
    <a class="block w-1/3 text-center text-sm no-underline
                             border border-slate-500 hover:shadow hover:shadow-slate-800 hover:bg-red-900 p-4 hover:rounded-3xl hover:scale-110 rounded-2xl bg-slate-900 text-slate-50 uppercase" role="button" href="/posts/{{$post->slug}}">Read more</a>
</div>
</div>
</div>
</article>
