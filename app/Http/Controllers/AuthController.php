<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {

            $credit = $request->validate([
                'login' => 'required|min:4|max:30',
                'password' => 'required|min:4|max:30',
            ]);

            if (Auth::attempt($credit)) {
                return redirect()->intended(route('home'));
            }

        }

        return view('pages.auth.login');

    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {

            $valid = $request->validate([
                'login' => 'required|min:4|max:30|unique:users|regex:/[A-Za-z-_]/',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:4|max:30',
                'password_confirmation' => 'required',
            ]);

            $valid['password'] = Hash::make($valid['password']);

            $user = User::create($valid);

            Auth::login($user);

            return redirect()->intended(route('home'));

        }

        return view('pages.auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}
