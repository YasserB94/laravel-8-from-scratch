<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
        $sharedValidation = ['required','max:255'];
        $attributes = request()->validate([
            'name'=>array_merge($sharedValidation,['min:4',]),
            'username'=>array_merge($sharedValidation,['min:4','unique:users,username']),
            'email'=>array_merge($sharedValidation,['min:6',Rule::unique('users','email')]),
            'password'=>array_merge($sharedValidation,['min:7'])
        ]);
        $user =User::create($attributes);
        auth()->login($user);
//        session()->flash('registered','Your account has been registered!');
        return redirect('/')->with('success','Your account has been registered!');
    }

}
