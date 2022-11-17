@props(['active'=>false])
@php
    $classes = "py-1.5 transition duration-300 hover:bg-blue-400  border border-black border-opacity-0 hover:border-opacity-5 rounded-xl ";
    if($active) $classes .= "bg-blue-500 text-white";
@endphp
<li {{$attributes(['class'=>$classes])}}>
    <a
        {{$attributes(['class'=>"block text-center w-full h-full"])}}>{{$slot}}</a>
</li>
