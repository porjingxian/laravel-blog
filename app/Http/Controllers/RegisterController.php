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
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $attributes['password']=bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/');
    }
}
