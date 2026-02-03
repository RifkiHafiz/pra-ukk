<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
            'profile_picture' => $request->profile_picture,
        ]);

        return redirect()->route('user.index')->with(['success' => 'User created successfully!']);
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
            'profile_picture' => $request->profile_picture,
        ]);

        return redirect()->route('user.index')->with(['success' => 'User updated successfully!']);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with(['success' => 'User deleted successfully!']);
    }
}
