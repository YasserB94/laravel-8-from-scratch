<x-dropdown>
    <x-slot:trigger>
        <button
            class="appearance-none flex w-full py-2 pl-3 pr-9 text-sm font-semibold"
        >
            {{isset($currentCategory)? $currentCategory->name : 'Categories'}}
            <x-icon name="down-arrow"
                    class="absolute -translate-y-1/2 top-1/2 pointer-events-none"></x-icon>
        </button>
    </x-slot:trigger>
    <x-dropdown-list-item href="/">All</x-dropdown-list-item>
    @foreach($categories as $category)
        @if(isset($currentCategory)&&$category->id==$currentCategory->id)
            @continue
        @endif
        <x-dropdown-list-item
            href="/?category={{$category->slug}}"{{--&{{http_build_query(request()->except('category'))}}--}}
        >
            {{ucfirst($category->name)}}
        </x-dropdown-list-item>
    @endforeach
</x-dropdown>
