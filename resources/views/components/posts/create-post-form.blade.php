    <form method="POST" action="/admin/posts" {{ $attributes }} enctype="multipart/form-data">
        @csrf
        <x-form-input :name="'title'"/>
        <x-form-file :name="'thumbnail'"/>
        <x-form-textarea :name="'summary'"/>
        <x-form-textarea :name="'body'"/>
        <x-form-category-dropdown/>
        <x-forms.button-submit class="mt-2">Publish</x-forms.button-submit>
    </form>
