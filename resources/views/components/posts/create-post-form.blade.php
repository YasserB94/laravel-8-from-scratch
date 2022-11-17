<form method="POST" action="/admin/posts" {{ $attributes }} enctype="multipart/form-data">
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
               id="title"
               value="{{old('title')}}">
        @error('title')
        <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
               for="thumbnail">Thumbnail</label>
        <input class="border p-2 w-full rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow
                    file:bg-blue-500 file:rounded-xl file:text-white border border-gray-100 file:px-4 file:py:2
                    hover:file:bg-transparent hover:file:text-gray-500 hover:file:border-gray-300
                     "
{{--               TODO:: ADD JS TO CHANGE DEFAULT BROWSER TEXT FOR INPUT--}}
               type="file" name="thumbnail" id="thumbnail">
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
        >{{old('summary')}}</textarea>
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
        >{{old('body')}}</textarea>
        @error('body')
        <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
               for="category_id">
            Category
        </label>
        <select
            class="border bg-transparent p-2 w-full resize-none rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow"
            name="category_id"
            id="category"
            required
        >
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{old('category_id')==$category->id?"selected":""}}
                >
                    {{ucwords($category->name)}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
    </div>
    <x-forms.button-submit class="mt-2">Publish</x-forms.button-submit>
</form>
