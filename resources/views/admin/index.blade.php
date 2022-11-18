<x-layout.layout>
    <section class="px-6 py-8">
        <x-admin.setting heading="Manage Posts">
            <div class="px-4 md:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="w-2/3 px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Published
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="col whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                                                {{$post->title}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <span class="rounded-full text-xs bg-green-200 px-2 text-gray-700 py-1">Published</span>
                                            </td>
                                            <td class="relative flex space-x-1 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-800">Edit
                                                    <span class="sr-only">{{$post->author}}'s post</span>
                                                </a>
                                                <form method="POST" action="/admin/posts/{{$post->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-xs text-red-500 hover:text-red-800">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-admin.setting>
        {{$posts->onEachSide(1)->links()}}
    </section>
</x-layout.layout>
w
