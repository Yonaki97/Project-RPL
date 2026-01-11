<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\Kategori;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        // query
        $query = Catatan::with(['User', 'Kategori'])
        ->withCount('comments','likes','bookmarks');

        // search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orwhere('id_user','like',"%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        // filter kategori
        if ($request->kategori) {
            $query->where('id_kategori', $request->kategori);
        }

        $catatans  = $query->latest()->get();
        $kategoris = Kategori::all();
        $user      = Auth::user();

        return view('pages.beranda', compact('user', 'catatans', 'kategoris'));
    }
}
