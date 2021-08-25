<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:3|max:40',
            'user_name' => 'required|min:3|max:50|unique:users,user_name',
            'email' => 'required|email|min:10|max:100|unique:users,email',
            'password' => 'required|min:4|max:15'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'User created successfully!');

        return redirect('/');
    }
}
