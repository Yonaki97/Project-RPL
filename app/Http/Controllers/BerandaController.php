<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\Kategori;
use App\Models\Feature;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        $query = Catatan::with(['User','Kategori'])->latest();

        // filter kategori
        if ($request-> kategori){
            $query->where('id_kategori',$request->kategori);
        }

        $catatans = $query->get();
        // $catatan = Catatan::latest()->get(); // ambil catatan
        $user = Auth::user(); // ambil user yang sedang login
        return view('pages.beranda', compact('user','catatans','kategoris')); // kirim ke Blade
    }

}