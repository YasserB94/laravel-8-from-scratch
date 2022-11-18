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
    public function store()
    {
        $post = new Post();
        $attributes = array_merge($this->validatePost($post),[
           'user_id'=>auth()->id(),
           'thumbnail'=>request()->file('thumbnail')->storePublicly('thumbnails', ['disk' => 'public'])
        ]);
        Post::create($attributes);
        return redirect('/')->with('success', 'Post has been created!');
    }
    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
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

    /**
     * @param Post $post
     * @return array
     */
    public function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => ['required', 'min:4'],
            'summary' => ['required', 'min:10'],
            'thumbnail' => $post->exists() ? ['image'] : ['required', 'image'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

}
