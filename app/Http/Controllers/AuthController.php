<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    // Display login page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Display registration page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register a new user
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('login')
            ->with('success', 'Registration successful! You can now log in.');
    }

    // Authenticate user with login attempt restriction
    
    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $key = Str::lower($request->email) . '|' . $request->ip();

    // Check if the user has already reached 5 failed attempts
    if (RateLimiter::tooManyAttempts($key, 5)) {
        $seconds = RateLimiter::availableIn($key);

        return back()->withErrors([
            'email' => "Too many login attempts. Please try again in {$seconds} seconds."
        ])->onlyInput('email');
    }

    // Check login credentials
    if (Auth::attempt($request->only('email', 'password'))) {

        RateLimiter::clear($key);

        $request->session()->regenerate();

        return redirect()->intended('/books');
    }

        // Count the failed attempt
        RateLimiter::hit($key, 60);

        // Immediately lock the user after the 5th failed attempt
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()->withErrors([
                'email' => "Account temporarily locked due to 5 failed login attempts. Please try again in {$seconds} seconds."
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.'
        ])->onlyInput('email');
    }


    // Log out user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
