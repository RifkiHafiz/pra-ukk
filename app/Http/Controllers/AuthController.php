<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ShowRegister() {
        return view('auth.register');
    }

    public function ShowLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
        ]);

        return redirect()->intended('/login')->with(['success' => 'Akun Berhasil Disimpan!']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }

        return view('products.index')->withErrors(['email' => 'Email atau Password Salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
