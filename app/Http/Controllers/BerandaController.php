<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login
        return view('pages.beranda', compact('user')); // kirim ke Blade
    }
}
