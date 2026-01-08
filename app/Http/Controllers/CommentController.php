<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $catatan_id)
    {
        $request->validate([
            'isi' => 'required|string'
        ]);

        Comment::create([
            'catatan_id' => $catatan_id,
            'isi' => $request->isi,
            'id_user' => auth()->id()
        ]);

        return back();
    }
}
