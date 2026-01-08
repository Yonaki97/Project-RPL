<?php

namespace App\Http\Controllers;
use App\Models\Bookmark;
class BookmarkController extends Controller
{
    public function toggle($catatan_id)
    {
        $userId = auth()->id();

        $bookmark = Bookmark::where('id_user', $userId)
            ->where('catatan_id', $catatan_id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
        } else {
            Bookmark::create([
                'id_user' => $userId,
                'catatan_id' => $catatan_id,
            ]);
        }

        return back();
    }
}
