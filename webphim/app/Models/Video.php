<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['maphim','duongdanvideo'];
    protected $primaryKey = 'maduongdanvideo';
    public $timestamps = false;

    public function phim() {
        return $this->belongsTo(Phim::class,null,'maduongdanvideo');
    }

    public function createdVideo($maphim, $duongdanvideo){
		// $video = new Video();
		$this->maphim = $maphim;
		$this->duongdanvideo = $duongdanvideo;
		$this->save();
	}
}
