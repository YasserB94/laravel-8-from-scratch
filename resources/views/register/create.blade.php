<x-layout.layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto border border-blue-100 shadow-2xl rounded-2xl">
            <form method="POST" action="/register" class=" space-y-2 shadow-md p-4">
                @csrf
                <h1 class="text-center text-2xl uppercase font-bold">Register</h1>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2"
                           for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name"
                        name="name"
                        type="text"
                        value="{{old('name')}}"
                        placeholder="Name">
                    @error('name')
                        <p class="text-xs text-red-600 mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2"
                           for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username"
                        name="username"
                        type="text"
                        value="{{old('username')}}"
                        placeholder="Username">
                    @error('username')
                        <p class="text-xs text-red-600 mt-1">{{$message}}</p>
                    @enderror
                </div><div>
                    <label class="block text-gray-700 text-sm font-bold mb-2"
                           for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        name="email"
                        type="email"
                        value="{{old('email')}}"
                        placeholder="Email">
                    @error('email')
                        <p class="text-xs text-red-600 mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password"
                        type="password"
                        placeholder="******************">
                    @error('password')
                        <p class="text-xs text-red-600 mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-end">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Register
                    </button>
                </div>
                @if($errors->any())
                    <ul class="text-xs text-red-500 space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </main>
    </section>
</x-layout.layout>
