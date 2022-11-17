@props(['posts'])
<x-posts.post-feature-card :post="$posts->first()"></x-posts.post-feature-card>
@if($posts->count() >1)
<div class="lg:grid lg:grid-cols-6 gap-2 lg:gap-4">
    @foreach($posts->skip(1) as $post)
    <x-posts.post-card :post="$post"
                 class="{{$loop->iteration<3?'col-span-3':'col-span-2'}} ">
    </x-posts.post-card>
    @endforeach
</div>
@endif
