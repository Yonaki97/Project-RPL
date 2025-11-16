<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // 🟢 Menampilkan halaman profil
    public function index()
    {
        $user = Auth::user();
        return view('pages.profil', compact('user'));
    }

    // 🟡 Update foto profil
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil diupdate!');
    }
}
