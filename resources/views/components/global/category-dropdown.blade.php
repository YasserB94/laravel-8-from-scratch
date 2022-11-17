<x-layout.dropdown>
    <x-slot:trigger>
        <button
            class="appearance-none flex w-full py-2 pl-3 pr-9 text-sm font-semibold"
        >
            {{isset($currentCategory)? $currentCategory->name : 'Categories'}}
            <x-assets.icon name="down-arrow"
                    class="absolute -translate-y-1/2 top-1/2 pointer-events-none"></x-assets.icon>
        </button>
    </x-slot:trigger>
    <x-layout.dropdown-list-item href="/">All</x-layout.dropdown-list-item>
    @foreach($categories as $category)
        @if(isset($currentCategory)&&$category->id==$currentCategory->id)
            @continue
        @endif
        <x-layout.dropdown-list-item
            href="/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}"{{--&{{http_build_query(request()->except('category'))}}--}}
        >
            {{ucfirst($category->name)}}
        </x-layout.dropdown-list-item>
    @endforeach
</x-layout.dropdown>
