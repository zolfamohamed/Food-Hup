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
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->is_admin == 1) {
             $user = User::where('email', $credentials['email'])->first();
            Auth::login($user);
            return redirect()->intended('/adminpage')
                ->with('success', 'login successful - Welcome, Admin '. $user["name"]);
        }
           $user = User::where('email', $credentials['email'])->first();
            Auth::login($user);
        return redirect()->intended('/')->with("success", "login successful - welcome, " . $user["name"]);

    }

    return back()->withErrors([
        'email' => 'Invalid email or password',
    ]);
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
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/',
        ],
    ], [
        'name.required' => 'Please enter your name',
        'name.min' => 'Name must be at least 3 characters',
        'email.required' => 'Please enter an email address',
        'email.email' => 'Email format is not correct',
        'email.unique' => 'Email already exists, try another',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters',
        'password.regex' => 'Password must contain uppercase, lowercase, number, and special character'
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
        return redirect('/');
    }
}
