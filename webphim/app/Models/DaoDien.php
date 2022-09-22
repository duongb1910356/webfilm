<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Phim;

class DaoDien extends Model
{
    protected $table = 'daodien';
    protected $fillable = ['tendaodien'];
    protected $primaryKey = 'madaodien';

    
    public function phims() {
        $this->setKeyName('madaodien');
        return $this->belongsToMany(Phim::class,'daodienthamgia','madaodien','maphim');
    }
}
