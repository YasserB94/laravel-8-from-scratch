@props(['post'])
<article
    {{$attributes->merge(['class'=>"transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}
>
    <div class="py-6 px-5 w-full">
        <a href="/posts/{{$post->slug}}" class="block">

            <img
                src="/images/illustration-3.png"
                alt="Blog Post illustration"
                class="rounded-xl"
            />
        </a>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"></x-category-button>
                </div>

                <div class="mt-4">
                    <h1 class="text-2xl h-16">
                        <a href="/posts/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $post->created_at->diffForHumans()}}</time>
                  </span>
                </div>
            </header>

            <div class="text-sm mt-4 h-14 overflow-y-clip">
                <p>
                    {{$post->summary}}
                </p>

            </div>

            <footer class="flex w-full justify-between items-center mt-8">
                <div class="flex items-center w-3/5 text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar"/>
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="?author={{$post->author->username}}&{{http_build_query(request()->except('author'))}}">
                                {{$post->author->name}}
                            </a>
                        </h5>

                    </div>
                </div>
                <a href="/posts/{{$post->slug}}">
                    <button class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300
                            rounded-full py-2 px-4 lg:px-6">

                        Read More
                    </button>
                </a>

            </footer>
        </div>
    </div>
</article>
