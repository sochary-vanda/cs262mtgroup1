<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // ─── REGISTER ───────────────────────────────────────────

    // Show Register Form (GET /register)
    public function showRegister()
    {
        return view('register');
    }

    // Handle Register (POST /register)
    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'min:3', 'max:10', 'unique:users,name'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:3', 'max:200'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // ─── LOGIN ───────────────────────────────────────────────

    // Show Login Form (GET /login)
    public function showLogin()
    {
        return view('login');
    }

    // Handle Login (POST /login)
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    // ─── LOGOUT ──────────────────────────────────────────────

    // Handle Logout (POST /logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
