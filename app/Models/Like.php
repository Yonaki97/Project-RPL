<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['id_user', 'catatan_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function catatan()
    {
        return $this->belongsTo(Catatan::class, 'catatan_id', 'id');
    }
}