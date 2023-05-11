<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        
        if(! auth()->attempt($attributes)){
            //auth failed
            throw ValidationException::withMessages([
                'email'=>'Your provided credentials could not be verified.'
            ]);
        }
        //attempt to authenticate & log user in
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back!');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
