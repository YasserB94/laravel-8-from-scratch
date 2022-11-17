<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-4xl mx-auto">
            <form method="POSTS" action="/admin/posts">
                @csrf
                <div>
                    <label class="block text-sm uppercase font-semibold mt-2 ml-1"
                           for="title">
                        Title
                    </label>
                    <input class="border p-2 w-full rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow"
                           name="title"
                           id="title">
                    @error('title')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
                           for="summary">
                        Summary
                    </label>
                    <textarea class="border p-2 w-full resize-none rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow
                    "
                              name="summary"
                              id="summary"
                              required
                    ></textarea>
                    @error('summary')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
                           for="body">
                        Body
                    </label>
                    <textarea class="border p-2 w-full resize-none rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow"
                              name="body"
                              id="body"
                              required
                    ></textarea>
                    @error('body')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
                           for="category">
                        Category
                    </label>
                    <select
                        class="border bg-transparent p-2 w-full resize-none rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow"
                        name="category"
                        id="category"
                        required
                    >
                        <option value=""></option>
                    </select>
                    @error('category')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <x-button-submit class="mt-2">Publish</x-button-submit>
            </form>
        </x-panel>
    </section>
</x-layout>
