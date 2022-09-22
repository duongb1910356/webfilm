<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $table = 'phim';
    protected $primaryKey = 'maphim';
    protected $fillable = ['tenphim', 'thoiluong', 'phathanh','sanxuat','mota'];
    public $timestamps = false;
    
    public function theloais() {
        $this->setKeyName('maphim');
        return $this->belongsToMany(TheLoai::class,'phim_theloai','maphim','matheloai');
    }

    // public function duongdan() {
    //     return $this->hasOne(DuongDan::class,'maduongdan','maphim');
    // }

    public function videos() {
        return $this->hasOne(Video::class,'maduongdanvideo','maphim');
    }


    public function images() {
        return $this->hasOne(Image::class,'id','maphim');
    }

    public function dienviens() {
        $this->setKeyName('maphim');
        return $this->belongsToMany(DienVien::class,'dienvienthamgia','maphim','madienvien');
    }

    public function daodiens() {
        $this->setKeyName('maphim');
        return $this->belongsToMany(DaoDien::class,'daodienthamgia','maphim','madaodien');
    }

    public function createdPhim(){
		$this->tenphim = htmlspecialchars($_POST['tenphim']);
		$this->thoiluong = htmlspecialchars($_POST['thoiluong']);
		$this->phathanh = htmlspecialchars($_POST['phathanh']);
		$this->sanxuat = htmlspecialchars($_POST['sanxuat']);
		$this->mota = htmlspecialchars($_POST['mota']);
		$this->save();
	}
}
