@props(['trigger'])
<div @click.away="show = false" x-data="{show:false}" @click="show =!show" class="rel w-full z-[50]">
    {{$trigger}}
    <ul x-show="show" @mouseleave="show=false" style="display: none"
        class="z-50 absolute bg-gray-100 bg-opacity-90 w-full rounded-2xl -mt-2 rounded-t-none ">
    {{$slot}}
    </ul>
</div>
</div>
