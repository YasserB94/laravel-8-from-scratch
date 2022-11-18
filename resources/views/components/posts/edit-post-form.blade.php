@props(['post'])
<form method="POST" action="/admin/posts/{{$post->id}}" {{ $attributes }} enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <x-form-input :name="'title'" :value="old('title',$post->title)"/>
    <x-form-file :name="'thumbnail'" :value="old('thumbnail',$post->thumbnail)"></x-form-file>
    <x-form-textarea :name="'summary'">{{old('summary',$post->summary)}}</x-form-textarea>
    <x-form-textarea :name="'body'" >{{old('body',$post->body)}}</x-form-textarea>
    <x-form-category-dropdown :post="$post"/>
    <x-forms.button-submit class="mt-2">Update</x-forms.button-submit>
</form>
