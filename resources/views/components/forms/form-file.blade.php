@props(['name'])
<div {{ $attributes }}>
    <label class="block text-sm uppercase font-semibold  mt-2 ml-1"
           for="{{$name}}">{{ucfirst($name)}}</label>
    <input class="border p-2 w-full rounded
                    outline-none outline-0 duration-150
                    focus:outline-1  focus:outline-gray-100 focus:shadow
                    file:bg-blue-500 file:rounded-xl file:text-white border border-gray-100 file:px-4 file:py:2
                    hover:file:bg-transparent hover:file:text-gray-500 hover:file:border-gray-300
                     "
           {{--               TODO:: ADD JS TO CHANGE DEFAULT BROWSER TEXT FOR INPUT--}}
           type="file" name="{{$name}}" id="{{$name}}">
    @error('$name')
    <p class="text-red-500 text-xs">{{$message}}</p>
    @enderror
</div>
