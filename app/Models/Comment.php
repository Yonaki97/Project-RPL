<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'catatan_id',
        'id_user',
        'isi'
    ];

    public function Catatan()
    {
        return $this->belongsTo(Catatan::class, 'catatan_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
