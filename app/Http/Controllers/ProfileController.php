<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catatan;

class ProfileController extends Controller
{
    // 🟢 Menampilkan halaman profil
    public function index()
    {
        $catatans= Catatan::where('id_user',auth()->id())->get();
        $user = Auth::user();
        return view('pages.profil', compact('user','catatans'));
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
