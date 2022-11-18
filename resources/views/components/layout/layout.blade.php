<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    {{--        <link rel="stylesheet" href="/app.css">--}}
    <title>Yasser's First Laravel Blog!</title>
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
<body style="font-family: Open Sans, sans-serif">
<header class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img
                    src="/images/logo.svg"
                    alt="Laracasts Logo"
                    width="165"
                    height="16"
                />
            </a>
        </div>

        <div class="flex items-center space-x-2 mt-8 md:mt-0">
            @auth()
                <x-layout.dropdown class="max-w-xl">
                    <x-slot:trigger>
                        <button class="font-bold uppercase">Hi, {{auth()->user()->name}} !</button>
                    </x-slot:trigger>
                    @can('admin')
                    <x-layout.dropdown-list-item
                        href="/admin/posts"
                        :active="request()->is('admin/dashboard')">Manage Posts
                    </x-layout.dropdown-list-item>
                    <x-layout.dropdown-list-item
                        href="/admin/posts/create"
                        :active="request()->is('admin/posts/create')">New Post
                    </x-layout.dropdown-list-item>
                    @endcan
                    <x-layout.dropdown-list-item href="#"
                    x-data="{}" @click.prevent="document.querySelector('#logout-form').submit();"
                    >Logout
                    </x-layout.dropdown-list-item>
                    <form method="POST" action="/logout" id="logout-form">
                        @csrf
                    </form>
                </x-layout.dropdown>
            @else
                <a href="/register" class="text-xs font-bold mr-4 uppercase">Register</a>
                <a href="/login"
                   class="bg-blue-500 duration-300 ml-3 hover:shadow rounded-full text-xs font-semibold hover:text-blue-700 border border-gray-200 hover:bg-transparent text-white uppercase py-2 px-4">Login</a>
            @endauth
            <a
                href="#newsletter"
                class="bg-blue-500 duration-300 ml-3 rounded-full hover:shadow text-xs font-semibold hover:text-blue-700 border border-gray-200 hover:bg-transparent text-white uppercase py-2 px-4"
            >
                Subscribe for Updates
            </a>
        </div>
    </nav>
</header>
{{$slot}}
<footer
    class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
>
    <img
        src="/images/lary-newsletter-icon.svg"
        alt=""
        class="mx-auto -mb-6"
        style="width: 145px"
    />
    <h5 class="text-3xl">Stay in touch with the latest posts</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class=" inline-block mx-auto bg-gray-200  rounded-full">
            <form method="POST" action="subscribe" id="newsletter" name="newsletter" class="flex text-sm">
                @csrf
                <div class="py-3 px-5 inline-flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="/images/mailbox-icon.svg" alt="mailbox letter"/>
                    </label>
                    <div>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            required
                            placeholder="Your email address"
                            class="bg-transparent text-gray-700 placeholder-gray-500 py-0 pl-4 focus-within:outline-none"
                        /> @error('email')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <button
                        type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
    </div>
</footer>
<x-global.flash/>
</body>

