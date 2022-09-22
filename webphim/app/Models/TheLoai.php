<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'theloai';
    protected $primaryKey = 'matheloai';
    protected $fillable = ['tentheloai'];

    public function phims() {
        $this->setKeyName('matheloai');
        return $this->belongsToMany(Phim::class,'phim_theloai','matheloai','maphim');
    }
}
