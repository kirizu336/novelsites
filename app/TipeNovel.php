<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeNovel extends Model
{
    protected $table = 'tipe_novel';
    protected $fillable = ['slug', 'nama_tipe', 'deleted'];
}
