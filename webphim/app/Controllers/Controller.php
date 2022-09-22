<?php

namespace App\Controllers;

use Illuminate\Support\Facades\App;
use League\Plates\Engine;
use App\Models\TheLoai;

class Controller
{
	protected $view;

	public function __construct()
	{
		$this->view = new Engine(ROOTDIR . 'views');
	}

	public function sendPage($page, array $data = [])
	{
		exit($this->view->render($page, $data));
	}

	protected function saveFormValues(array $data, array $except = [])
	{
		$form = [];
		foreach ($data as $key => $value) {
			if (!in_array($key, $except, true)) {
				$form[$key] = $value;
			}
		}
		$_SESSION['form'] = $form;
	}

	protected function getSavedFormValues()
	{
		return session_get_once('form', []);
	}

	public function sendNotFound(){
		http_response_code(404);
		echo count(TheLoai::all());
		exit($this->view->render('errors/404'));
	}
}
