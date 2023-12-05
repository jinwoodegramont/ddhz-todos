<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function form() {

        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view("auth.form");
    }
    public function register_account(Request $request) {

        $request->validate([
            'username' => 'required|alpha_dash:ascii|min:4|max:32|unique:users',
            'email'=> 'required|email|max:100|unique:users',
            'password' => 'required|min:8|max:32'
        ]);

        User::create([
            'username'=> $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
                ->route('auth.form')
                ->withSuccess('You can now login with your registered credentials!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:8|max:32'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'msg' => 'Invalid email or password.',
        ])->onlyInput('email');
    } 

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.form');
    }  
}
