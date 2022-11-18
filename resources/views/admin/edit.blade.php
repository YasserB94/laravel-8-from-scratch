<x-layout.layout>
    <section class="px-6 py-8">
        <x-admin.setting heading="Edit: {{$post->title}}">
            <x-posts.edit-post-form :post="$post"/>
        </x-admin.setting>
    </section>
</x-layout.layout>
