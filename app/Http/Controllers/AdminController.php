<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Catatan;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Halaman Dashboard Admin
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCatatans = Catatan::count();
        $bannedUsers = User::where('is_banned', true)->count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalCatatans', 'bannedUsers'));
    }

    // Halaman Daftar User
    public function users()
    {
        $users = User::withCount('catatans')->latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    // Ban/Unban User
    public function toggleBan($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent admin from banning themselves
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak bisa ban diri sendiri!');
        }

        // Prevent banning other admins
        if ($user->is_admin) {
            return redirect()->back()->with('error', 'Tidak bisa ban admin lain!');
        }

        $user->is_banned = !$user->is_banned;
        $user->save();

        $status = $user->is_banned ? 'dibanned' : 'unbanned';
        return redirect()->back()->with('success', "User {$user->name} berhasil {$status}");
    }

    // Halaman Daftar Catatan
    public function catatans()
    {
        $catatans = Catatan::with(['user', 'kategori'])
                          ->withCount(['likes', 'comments'])
                          ->latest()
                          ->paginate(20);
        
        return view('admin.catatans', compact('catatans'));
    }

    // Hapus Catatan oleh Admin
    public function destroyCatatan($id)
    {
        $catatan = Catatan::findOrFail($id);
        
        // Hapus file lampiran jika ada
        if($catatan->lampiran && Storage::disk('public')->exists($catatan->lampiran)){
            Storage::disk('public')->delete($catatan->lampiran);
        }
        
        $userName = $catatan->user->name;
        $catatan->delete();
        
        return redirect()->back()->with('success', "Catatan dari {$userName} berhasil dihapus");
    }
}