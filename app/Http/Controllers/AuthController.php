<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], [
        'email.required' => 'Email is required',
        'email.email' => 'Email format invalid',
        'password.required' => 'Password is required'
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect('/')->with('success', 'Welcome back!');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ], [
        'name.required' => 'Please enter your name',
        'name.min' => 'Name must be at least 3 characters',
        'email.required' => 'Please enter an email address',
        'email.email' => 'Email format is not correct',
        'email.unique' => 'Email already exists, try another',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/login')->with('success', 'Account created successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
