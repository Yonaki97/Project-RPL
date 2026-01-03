<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $fillable = ['file_path'];

    public function catatan(){
        return $this->BelongsTo('Catatan::class');
    }
}
