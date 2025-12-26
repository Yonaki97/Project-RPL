<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman
    public function showSignin() {
        return view('pages.signin');
    }

    public function showSignup() {
        return view('pages.signup');
    }

    // Proses Sign Up
    public function signup(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/signin')->with('success', 'Account created! Please sign in.');
    }

public function signin(Request $request)
{
    $request->validate([
        'name' => 'required', // bisa email atau username
        'password' => 'required',
    ]);

    $loginInput = $request->name; // input dari form (bisa email atau nama)
    $password = $request->password;

    // cek apakah input berupa email atau nama
    $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    // coba login dengan field yang sesuai
    if (Auth::attempt([$fieldType => $loginInput, 'password' => $password])) {
        $request->session()->regenerate();
        return redirect('/beranda');
    }

    return back()->withErrors([
        'name' => 'Email atau nama pengguna atau password salah.',
    ])->withInput();
}

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signin');
    }
}
