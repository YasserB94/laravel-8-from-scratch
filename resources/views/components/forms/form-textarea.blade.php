@props(['name'])
<div {{ $attributes }}>
    <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
           for="{{$name}}">
        {{ucfirst($name)}}
    </label>
    <textarea class="border p-2 w-full resize-none rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow
                    "
              name="{{$name}}"
              id="{{$name}}"
              required
    >{{$slot??old($name)}}</textarea>
    @error($name)
    <p class="text-red-500 text-xs">{{$message}}</p>
    @enderror
</div>
