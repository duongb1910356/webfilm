<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Phim;

class DienVien extends Model
{
    protected $table = 'dienvien';
    protected $fillable = ['tendienvien'];
    protected $primaryKey = 'madienvien';
    public $timestamps = false;

    
    public function phims() {
        $this->setKeyName('madienvien');
        return $this->belongsToMany(Phim::class,'dienvienthamgia','madienvien','maphim');
    }
}
