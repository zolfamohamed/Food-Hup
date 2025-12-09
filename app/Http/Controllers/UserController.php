<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function registerForm()
    {
        return view('users.register');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('login.form')->with('success', 'Account created successfully!');
    }


    public function loginForm()
    {
        return view('users.login');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);

            return redirect()->route('Product.index');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect',
        ])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Product.index');
    }
}
