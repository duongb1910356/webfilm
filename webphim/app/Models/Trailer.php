<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $table = 'trailer';
    protected $primarykey = 'matrailer';
    protected $fillable = ['matrailer', 'maphim', 'maduongdan','thoiluong', 'khoichieu'];
    
    public function duongdan() {
        return $this->hasOne(DuongDan::class,'maduongdan','matrailer');
    }
    public function phim() {
        return $this->belongsTo(Phim::class,'maphim','matrailer');
    }
}
