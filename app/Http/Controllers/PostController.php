<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',[
            'posts'=>Post::latest()->filter(request(['search','category','author']))
                ->paginate(10)->withQueryString(),
        ]);
    }
    public function show(Post $post){
        return view('posts.show',[
            'post'=>$post,
        ]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
        $attributes = request()->validate([
           'title'=>['required','min:4'],
           'summary'=>['required','min:10'],
           'thumbnail'=>['required','image'],
           'body'=>['required','min:10'],
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);

        //TODO::ADD ALT TEXT OPTION
        $attributes['thumbnail'] = request()->file('thumbnail')->storePublicly('thumbnails',['disk'=>'public']);
        $attributes['user_id'] = auth()->id();
        Post::create($attributes);
        return redirect('/')->with('success','Post has been created!');
    }
}
