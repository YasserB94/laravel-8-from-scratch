<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminPostController,
    CommentController,
    NewsletterController,
    PostController,
    RegisterController,
    SessionController};
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


//POSTS
Route::get('/',[PostController::class,'index']);
Route::get('posts/{post:slug}',[PostController::class,'show']);
Route::post('posts/{post:slug}/comments',[CommentController::class,'store']);
//REGISTER
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
//SESSION
Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionController::class,'store'])->middleware('guest');
Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
//NewsLetter
Route::post('subscribe',NewsletterController::class);
Route::post('/posts/subscribe',NewsletterController::class);

//ADMIN ROUTES
Route::get('admin/posts/create',[AdminPostController::class,'create'])->middleware('admin');
Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');
Route::post('admin/posts',[AdminPostController::class,'store'])->middleware('admin');
Route::patch('admin/posts/{post}',[AdminPostController::class,'update'])->middleware('admin');
Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy'])->middleware('admin');
