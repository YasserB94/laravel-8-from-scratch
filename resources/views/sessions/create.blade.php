<x-layout.layout>
    <section class="px-6 py-8">
        <main>
            <x-layout.panel>
            <form method="POST" action="/sessions" class="space-y-2">
                @csrf
                <h1 class="text-center text-2xl uppercase font-bold">Login</h1>

                <div>
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
                    <x-forms.button-submit>Login</x-forms.button-submit>
                </div>
            </form>
            </x-layout.panel>
        </main>
    </section>
</x-layout.layout>
