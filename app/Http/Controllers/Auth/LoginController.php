<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginRequest(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return to_route('url.index')->withSuccess(__('Login successfully'));
        }

        return back()->withError(__('Invalid credentials'));
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->withSuccess(__('Logout successfully'));
    }
}
