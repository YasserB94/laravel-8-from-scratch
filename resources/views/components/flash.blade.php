@if(session()->has('success'))
    <div
            x-data="{show:true}"
            x-init="setTimeout(()=> show = false,5000)"
            x-show="show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-50"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-50"
            {{ $attributes->class(['fixed bottom-8 rounded-xl scale right-4 p-4 bg-blue-500 text-white text-center']) }}>
        <p>{{session('success')}}</p>
    </div>
@endif
@if(session()->has('errors'))
    <div
        x-data="{show:true}"
        x-init="setTimeout(()=> show = false,5000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-1000"
        x-transition:enter-start="opacity-0 animate-bounce scale-50"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-1000"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-50"
        {{ $attributes->class(['fixed bottom-8 rounded-xl scale right-4 p-4 bg-red-500 text-white text-center']) }}>
        <p>{{session('errors')->first()}}</p>
    </div>
@endif
