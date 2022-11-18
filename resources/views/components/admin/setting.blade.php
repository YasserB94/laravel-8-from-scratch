@props(['heading'])
<h1 class="text-center border-b-2 border-gray-200 mb-4 text-xl">{{$heading}}</h1>
<div class="flex gap-2">
<aside class="w-1/5">
    <x-layout.panel>
    <ul class="space-y-2">
        <li class="p-2 shadow hover:shadow-none rounded-xl border hover:border-gray-300 border border-gray-200 hover:bg-blue-400 duration-300">
            <a href="/admin/posts">Manage Posts</a></li>
        <li class="p-2 shadow hover:shadow-none rounded-xl  border hover:border-gray-300  border-gray-200 hover:bg-blue-400 duration-300">
            <a href="/admin/posts/create">Create Post</a></li>
    </ul>
    </x-layout.panel>
</aside>
<main class="w-4/5">
    <x-layout.panel class="max-w-4xl mx-auto">
        {{$slot}}
    </x-layout.panel>
</main>
</div>
