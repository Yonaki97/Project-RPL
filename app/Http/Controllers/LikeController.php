<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle($catatan_id)
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
