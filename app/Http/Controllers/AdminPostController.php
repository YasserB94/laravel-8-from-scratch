<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()
    {
        return view('admin.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit(Post $post)
    {
        return view('admin.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes = request()->validate([
            'title' => ['required', 'min:4'],
            'summary' => ['required', 'min:10'],
            'thumbnail' => ['image'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail']= \request()->file('thumbnail')->storePublicly('thumbnails',['disk' => 'public']);
        }
        $post->update($attributes);
        return redirect('/posts/' . $post->slug)->with('success', 'Post updated successfully!');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('success','Post has been deleted');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:4'],
            'summary' => ['required', 'min:10'],
            'thumbnail' => ['required', 'image'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        //TODO::ADD ALT TEXT OPTION
        $attributes['thumbnail'] = request()->file('thumbnail')->storePublicly('thumbnails', ['disk' => 'public']);
        $attributes['user_id'] = auth()->id();
        Post::create($attributes);
        return redirect('/')->with('success', 'Post has been created!');
    }
}
