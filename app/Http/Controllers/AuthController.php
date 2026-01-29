<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('dashboard');
    }
    public function ShowRegister() {
        return view('auth.register');
    }

    public function ShowLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
           'username' => $request->username,
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
            return redirect()->route('dashboard');
        }

        return view('dashboard')->withErrors(['email' => 'Email atau Password Salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
