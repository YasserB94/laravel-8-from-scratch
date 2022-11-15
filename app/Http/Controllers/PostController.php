<?php

namespace App\Http\Controllers;

use App\Models\{Category,Post};
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->filter(request(['search','category']))->get();
        return view('posts',[
            'posts'=>$posts,//->Get the Categories here so the view does not make extra SQL xcalls
            //'posts' => Post::all()
            // This results in extra queries for each post when it gets the category
            //'categories'=>Category::all(),
//            'currentCategory' =>Category::firstWhere('slug',request('category')),
        ]);
    }
    public function show(Post $post){
        return view('post',[
            'post'=>$post,
//       'post' => Post::findOrFail($id) We can inject into our function to ommit this call
        ]);
    }
}
