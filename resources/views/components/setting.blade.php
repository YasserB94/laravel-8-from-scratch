@props(['heading'])
<h1 class="text-center border-b-2 border-gray-200 mb-4 text-xl">{{$heading}}</h1>
<div class="flex">
<aside class="w-1/5">
    <x-layout.panel class="p-0 md:p-2 lg:p-4">
    <ul class="space-y-4 py-4 px-2">
        <li class="p-2 shadow-xl hover:shadow-none rounded-xl border-t-2 hover:border-gray-300 hover:border border-gray-200 hover:bg-blue-400 duration-300">
            <a href="/admin/posts/create">Create Post</a></li>
        <li class="p-2 shadow-xl hover:shadow-none rounded-xl border-t-2 hover:border-gray-300 hover:border border-gray-200 hover:bg-blue-400 duration-300">
            <a href="#">Delete Post</a></li>
        <li class="p-2 shadow-xl hover:shadow-none rounded-xl border-t-2 hover:border-gray-300 hover:border border-gray-200 hover:bg-blue-400 duration-300">
            <a href="#">Update Post</a></li>
    </ul>
    </x-layout.panel>
</aside>
<main class="w-4/5">
    <x-layout.panel class="max-w-4xl mx-auto">
        {{$slot}}
    </x-layout.panel>
</main>
</div>
