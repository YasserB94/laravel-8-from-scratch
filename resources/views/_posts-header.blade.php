@props(['categories','currentCategory'])
<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">
        By Lary Laracore
        <img src="/images/lary-head.svg" alt="Head of Lary the mascot"/>
    </h2>

    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing the popular Laravel
        series with new content. I'm going to keep you guys up to speed with
        what's going on!
    </p>

    <div class="space-y-2 w-full lg:space-y-0 lg:inline-flex lg:space-x-4 mt-8">
        <!--  Category -->
        <div
            class="relative w-full lg:inline-flex rounded-xl bg-gray-100"
        >
            <x-dropdown>
                <x-slot:trigger>
                    <button
                        class="appearance-none flex w-full py-2 pl-3 pr-9 text-sm font-semibold"
                    >
                        {{isset($currentCategory)? $currentCategory->name : 'Categories'}}
<x-icon name="down-arrow" class="absolute -translate-y-1/2 top-1/2 pointer-events-none"></x-icon>
                    </button>
                </x-slot:trigger>
                <x-dropdown-list-item href="/">All</x-dropdown-list-item>
                @foreach($categories as $category)
                    @if(isset($currentCategory)&&$category->id==$currentCategory->id)
                        @continue
                    @endif
                    <x-dropdown-list-item href="/categories/{{$category->slug}}">{{ucfirst($category->name)}}</x-dropdown-list-item>
                @endforeach
            </x-dropdown>
            <!-- Other Filters -->
            <div
                class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl"
            >
                <select
                    class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
                >
                    <option value="category" disabled selected>Other Filters</option>
                    <option value="foo">Foo</option>
                    <option value="bar">Bar</option>
                </select>

                <x-icon name="down-arrow" class="absolute -translate-y-1/2 top-1/2 pointer-events-none"></x-icon>
            </div>

            <!-- Search -->
            <div
                class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2"
            >
                <form method="GET" action="#">
                    <input
                        type="text"
                        name="search"
                        placeholder="Find something"
                        class="bg-transparent placeholder-black font-semibold text-sm"
                    />
                </form>
            </div>
        </div>
</header>
