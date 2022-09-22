<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuongDan extends Model
{
    protected $table = 'duongdan';
    protected $fillable = ['maduongdan','maphim','duongdanhinh', 'duongdanvideo'];
    
    public function definepath(){
        $this->duongdanhinh =  "http://webphim.localhost/" . $this->duongdanhinh;
        $this->duongdanvideo = "http://webphim.localhost/" . $this->duongdanvideo;
    }

    public function phim() {
        return $this->belongsTo(Phim::class,null,'maduongdan');
    }
}
