@props(['categories','currentCategory'])
<header class="max-w-xl mx-auto mt-5 text-center">
    <h1 class="text-4xl">
        Yasser's First
        <x-text-animation class="text-blue-500 duration-300 transition">Laravel</x-text-animation>
        Blog
    </h1>

    <p class="inline-flex duration-300 text-sm hover:text-blue-500 hover:scale-110">
        <img src="/images/lary-head.svg" class="h-4 w-4" alt="Head of Lary the mascot"/>
        <a class="mx-2" href="https://laracasts.com/series/laravel-8-from-scratch/" target="_blank">Visit the Laravel
            From Scratch Series on Laracasts </a>
        <img src="/images/lary-head.svg" class="h-4 w-4" alt="Head of Lary the mascot"/>
    </p>
    <div class="space-y-2 w-full lg:space-y-0 lg:inline-flex lg:space-x-4 mt-2">
        <!--  Category -->
        <div
            class="relative w-full lg:inline-flex rounded-xl bg-gray-100"
        >
            <x-category-dropdown></x-category-dropdown>
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
                        value="{{request('search')}}"
                        class="bg-transparent placeholder-black font-semibold text-sm"
                    />
                </form>
            </div>
        </div>
    </div>
</header>
