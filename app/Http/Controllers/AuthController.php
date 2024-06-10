<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }
    public function profile()
    {
        return view('auth.profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
