<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('pages.login_admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // CHECK ADMIN ROLE
            if (auth()->user()->role == 'admin') {

                return redirect('/dashboard');
            }

            // NOT ADMIN
            Auth::logout();

            return back()->withErrors([
                'email' => 'You are not admin',
            ]);
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }
}