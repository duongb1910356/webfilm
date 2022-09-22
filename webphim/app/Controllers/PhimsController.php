<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Contact;
use App\Models\Phim;
use App\Models\TheLoai;
use App\Models\Image;
use App\Models\Video;


class  PhimsController extends Controller
{
	public function drawphim($phims)
	{
		$output = "";
		foreach ($phims as $phim) {
			$output .=
				'<div class="col-md-3">
					<div class="mb-4">
						<img src="data:image/' . $phim->images->loai . ';charset=utf8;base64,' . base64_encode($phim->images->noidung) . '" style="width: 100%;" alt="" class="side-bar__img">
						<div class="side-bar__title d-flex align-items-center">
							<a href="/phim/detail/' . $phim->maphim . '"><i style="color: red;" class="fa fa-play mx-2"></i></a>
							<div class="side-bar__title-img test1">
								<span class="">' . $phim->tenphim . '</span><br>
							</div>
						</div>
					</div>
				</div>';
		}
		return $output;
	}


	public function loadpage()
	{
		$current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 2;
		$matheloai = isset($_GET['matheloai'])? $_GET['matheloai'] : '';
		$tenphim = isset($_GET['tenphim'])? $_GET['tenphim'] : '';
		$maphim = isset($_SESSION['maphim'])? $_SESSION['maphim'] : '';
		$limit = 10;
		$start = ($current_page - 1) * $limit;

		if($tenphim!=''){
			$phims = Phim::where('tenphim','like','%'. $tenphim .'%')->skip($start)->take($limit)->get();
		}
		else if($matheloai!=''){
			$theloai = TheLoai::where('matheloai',$matheloai)->first();
			$phims = $theloai->phims->skip($start)->take($limit);
		} else{
			$phims = Phim::skip($start)->take($limit)->get();
		}

		$total_record = Phim::count();
		$total_page = ceil($total_record / $limit);
		$output = "";
		if ($current_page <= $total_page) {
			$output = $this->drawphim($phims);
		}
		echo $output;
	}
	public function index()
	{
		$phims = Phim::take(10)->get();
		$this->sendPage('phim/home', [
			'phims' => $phims,
			// 'thongbao' => $phims->images->tenhinh
		]);
	}

	public function showFollowTheLoai($theloai_id, $current_page = 1)
	{
		$this->sendPage('phim/home', [
			'phims' => TheLoai::where('matheloai', $theloai_id)->first()->phims->take(10), 'theloais' => TheLoai::all(),
			'theloaicuaphim' => TheLoai::where('matheloai', $theloai_id)->first()
		]);
	}
	public function showAddPage()
	{
		$this->sendPage('phim/add', [
			'errors' => session_get_once('errors'),
			'old' => $this->getSavedFormValues()
		]);
	}

	public function showDeXuat($contact_id)
	{
		$_SESSION['maphim'] = $contact_id;
		$phim = Phim::where('maphim', '=', $contact_id)->first();
		$dsmaphimdexuat = [];
		foreach ($phim->theloais as $theloai) {
			foreach ($theloai->phims as $dexuat) {
				if ($dexuat->maphim != $phim->maphim)
					$dsmaphimdexuat[] = $dexuat->maphim;
			}
		}
		if(count($dsmaphimdexuat)!=0){
			$dsmaphimdexuat = array_unique($dsmaphimdexuat);
			foreach ($dsmaphimdexuat as $dx) {
				$dexuats[] = Phim::where('maphim', $dx)->first();
			}
			$this->sendPage('phim/detail', ['data' => $phim,'dexuats' => $dexuats,'theloais' => TheLoai::all()]);
		}
		$this->sendPage('phim/detail', ['data' => $phim, 'theloais' => TheLoai::all()]);
	}

	public function showListPhim()
	{
		if(isset($_SESSION['user_id'])){
			$this->sendPage('phim/manager', [
				'phims' => Phim::all()
			]);
		} else{
			redirect('/');
		}
	}

	public function addPhim()
	{
		//LƯU PHIM
		$phim = new Phim;
		$phim->createdPhim();

		//LƯU ẢNH
		if (!empty($_FILES["duongdanhinh"]["name"])) {
			$fileName = basename($_FILES["duongdanhinh"]["name"]);
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
			$extensions_arr = array("jpg", "jpeg", "png", "gif");
			if (in_array($fileType, $extensions_arr)) {
				$image = $_FILES['duongdanhinh']['tmp_name'];
				$imgContent = file_get_contents($image);
				$img = new Image;
				$img->createdImage($phim->maphim, $fileName, $fileType, $imgContent);
			}
		}

		//LƯU VIDEO
		$video = new Video;
		$video->createdVideo($phim->maphim,$_POST['duongdanvideo']);

		//LƯU DANH SÁCH DIỄN VIÊN THAM GIA
		if(isset($_POST['chondienvien']) == True){
			$dsmadienvien = $_POST['chondienvien'];
			foreach($dsmadienvien as $madienvien){
				$phim->dienviens()->attach($madienvien);
			}
		}
		
	
		
		//LƯU DANH SÁCH ĐẠO DIỄN THAM GIA
		if(isset($_POST['chondaodien']) == True){
			$dsmadaodien = $_POST['chondaodien'];
			foreach($dsmadaodien as $madaodien){
				$phim->daodiens()->attach($madaodien);
			}
		}		
		 	
		//LƯU THỂ LOẠI
		if(isset($_POST['chontheloai']) == True){
			$dsmatheloai = $_POST['chontheloai'];
			foreach($dsmatheloai as $matheloai){
				$phim->theloais()->attach($matheloai);
			}
		}
		redirect('/manager');
	}

	public function showAddPhim()
	{
		$this->sendPage('phim/addphim', []);
	}

	public function showEditPhim($phim_id)
	{
		// echo $phim_id;
		$phim = Phim::where('maphim', $phim_id)->first();
		$this->sendPage('phim/editphim', [
			'phim' => $phim
		]);
	}

	public function editPhim($phim_id)
	{
		$phim = Phim::where('maphim', $phim_id)->first();
		$phim->tenphim = $_POST['tenphim'];
		$phim->sanxuat = $_POST['sanxuat'];
		$phim->phathanh = $_POST['phathanh'];
		$phim->thoiluong = $_POST['thoiluong'];
		$phim->mota = $_POST['mota'];
		
		$video = Video::where('maphim', $phim->maphim)->first();
		$video->duongdanvideo = $_POST['duongdanvideo'];
		$video->save();

		$phim->dienviens()->detach();
		if(isset($_POST['chondienvien'])==True){
			$dsmadienvien = $_POST['chondienvien'];
			foreach ($dsmadienvien as $madienvien) {
				echo $madienvien;
				$phim->dienviens()->attach($madienvien);
			}
		}

		$phim->daodiens()->detach();
		if(isset($_POST['chondaodien'])==True){
			$dsmadaodien = $_POST['chondaodien'];
			foreach ($dsmadaodien as $madaodien) {
				$phim->daodiens()->attach($madaodien);
			}
		}

		$phim->theloais()->detach();
		if(isset($_POST['chontheloai'])){
			$dsmatheloai = $_POST['chontheloai'];
			foreach ($dsmatheloai as $matheloai) {
				$phim->theloais()->attach($matheloai);
			}
		}

		if (!empty($_FILES["duongdanhinh"]["name"])) {
			echo "toi day roi";

			$fileName = basename($_FILES["duongdanhinh"]["name"]);
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
			$extensions_arr = array("jpg", "jpeg", "png", "gif");
			if (in_array($fileType, $extensions_arr)) {
				$image = $_FILES['duongdanhinh']['tmp_name'];
				$imgContent = file_get_contents($image);
				$img = Image::where('maphim', $phim->maphim)->first();
				$img->tenhinh = $fileName;
				$img->noidung = $imgContent;
				$img->save();
			}
		}
		$phim->save();
		// echo "vdo" . $phim->videos->duongdanvideo;
		redirect('/manager');
	}


	public function createdImage($maphim, $fileName, $imgContent)
	{
		$img = new Image;
		$img->maphim = $maphim;
		$img->tenhinh = $fileName;
		$img->noidung = $imgContent;
		return $img;
	}

	public function xoaPhim($phim_id)
	{
		echo "xoane";
		$phim = Phim::where('maphim', $phim_id)->first();
		$phim->delete();
		redirect('/manager');
	}
}
