<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
        {
            // Validate that the fields are not empty
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            // Attempt login
            if (Auth::attempt($request->only('email', 'password'))) {
        
                $request->session()->regenerate();
        
                return redirect('/home');
            }
        
            // Login failed
            return back()
                ->withErrors([
                    'email' => __('messages.login_failed'),
                ])
                ->withInput();
        }

   public function register(Request $request)
    {
       $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'phone'     => 'required',
            'password'  => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);
    
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'user',
            'phone'     => $request->phone,
        ]);
    
        Auth::login($user);
    
        return redirect('/home');
    }
}