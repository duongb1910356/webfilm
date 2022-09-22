<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['id', 'maphim', 'tenhinh', 'loai', 'noidung'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function saveImg($img)
    {
        $this->image = $img;
        $this->save();
    }
    public function phim()
    {
        return $this->belongsTo(Phim::class, null, 'id');
    }

    public function createdImage($maphim, $fileName, $fileType, $imgContent)
    {
        $this->maphim = $maphim;
        $this->tenhinh = $fileName;
        $this->noidung = $imgContent;
        $this->loai = $fileType;
        $this->save();
    }
}
