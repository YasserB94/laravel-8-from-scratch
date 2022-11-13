<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Post,Category};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts',[
        'posts'=>Post::with('category')->get()//->Get the Categories here so the view does not make extra SQL xcalls
        //'posts' => Post::all()
        // This results in extra queries for each post when it gets the category
    ]);
});
Route::get('posts/{post:slug}',function(Post $post){
   return view('post',[
       'post'=>$post
//       'post' => Post::findOrFail($id) We can inject into our function to ommit this call
   ]);
});

Route::get('categories/{category:slug}',function (Category $category){
    return view('posts',[
        'posts' => $category->posts
        ]
    );
});
