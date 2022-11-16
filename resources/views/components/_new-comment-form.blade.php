@props([
    'post'
])

<form method="POST"
      id="newcomment"
      name="newcomment"
      action="/posts/{{$post->slug}}/comments" {{ $attributes->class(['p-4 space-y-2 rounded-xl w-full border border-gray-200 bg-gray-100']) }}>
    @csrf
    @auth()
        <header class="flex space-x-4 items-center">
            <img class="rounded-full max-h-16 aspect-square shadow-xl"
                 src="https://i.pravatar.cc/100?u={{auth()->user()->id}}" alt="User avatar">
            <h3>Tell us something new <span class="text-blue-600"> {{ auth()->user()->username }}</span> !</h3>
        </header>
        <div>
            <textarea  required placeholder="what are you thinking about ?" name="body"
                      class="w-11/12 p-2 ml-auto block rounded focus:border-y-blue-900 text-gray-500  focus:border-blue-500 h-20 resize-none"></textarea>
            @error('body')
            <span class="ml-auto text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>

        <button
            form="newcomment"
            class="bg-blue-400 block ml-auto border-2 border-gray-200 text-gray-100 hover:bg-gray-100 transition-all duration-300 hover:border-blue-500 hover:text-blue-700 px-4 py-2 rounded-xl text-center">
            Comment
        </button>
    @else
        <header class="flex space-x-4 items-center">
            <img class="rounded-full max-h-16 aspect-square shadow-xl" src="https://i.pravatar.cc/100?u={{$post->id}}}"
                 alt="User avatar">
            <h3>Share your toughts!</h3>
        </header>
        <div>
            <textarea name="body" disabled placeholder="Please log in to leave comments"
                      class="w-11/12 p-2 ml-auto block rounded  focus:border-indigo-500 h-20 resize-none"></textarea>
        </div>
        <button disabled
                class="bg-blue-400 disabled:opacity-25 block ml-auto border-2 border-gray-200 text-gray-100  transition-all duration-300  px-4 py-2 rounded-xl text-center">
            Comment
        </button>
@endauth
</form>
