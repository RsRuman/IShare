<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class SessionController extends Controller
{
    public function create(){
        return view('login.create');
    }

    public function login(){
        $attributes = request()->validate([
            'user_name' => 'required|min:3|max:20',
            'password' => 'required|min:4|max:20'
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back...');
        }
//          throw validationException::withMessages(['password' => 'Invalid credential!']);
            return back()->withInput()->withErrors(['password' => 'Invalid credential!']);

    }

    public function logout(){
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye!');
    }
}
