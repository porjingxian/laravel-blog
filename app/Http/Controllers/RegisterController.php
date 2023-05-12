<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attributes=request()->validate([
            'name'=>'required|max:60|min:3',
            'username'=>'required|max:60|min:3|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:7|max:60'
        ]);
        $user=User::create($attributes);
    
        auth()->login($user);

        //flash message
        return redirect('/')->with('success', 'Your account has been created!');
    }
}
