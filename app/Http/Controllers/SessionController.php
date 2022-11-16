<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //Login Form 
    public function create(){
        return view('sessions.create');
    }
    //Login - Store new session
    public function store(){

        $creds = \request()->validate([
            'email'=>['required','exists:users,email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($creds)){
            session()->regenerate();//Prevent Session Fixation Attack
            return redirect('/')->with('success','Welcome back '.auth()->user()->name . '!');
        }
        //If credentials wrong
        throw ValidationException::withMessages([
            'email'=>'Provided credentials could not be verified'
        ]);
//        return back()
//            ->withInput()
//            ->withErrors(['email' =>'Wrong Email or Password']);

    }
    //Logout
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','goodbye!');
    }
}
