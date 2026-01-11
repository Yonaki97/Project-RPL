<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Catatan;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Catatan $catatan)
    {
        $userId = auth()->id();

        $like = Like::where('id_user', $userId)
                    ->where('catatan_id', $catatan_id)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'id_user' => $userId,
                'catatan_id' => $catatan_id
            ]);
        }

        return back();
    }
}
