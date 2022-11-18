
<div {{ $attributes }}>
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
