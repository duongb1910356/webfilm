<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'My Phonebook');

session_start();

$router = new \Bramus\Router\Router();

//Đăng nhập
$router->get('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

//Trang chủ
$router->get('/', '\App\Controllers\PhimsController@index');
$router->get('/home', '\App\Controllers\PhimsController@index');

//Gọi tải thêm phim trên trang
$router->get('/ajax', '\App\Controllers\PhimsController@loadpage');
$router->post('/ajax', '\App\Controllers\PhimsController@loadpage');

//Xem chi tiết phim
$router->get('/phim/detail/(\d+)', '\App\Controllers\PhimsController@showDeXuat');

//Quản lý danh sách phim
$router->get('/manager','App\Controllers\PhimsController@showListPhim');

//Thêm sửa xóa phim
$router->get('/manager/add','App\Controllers\PhimsController@showAddPhim');
$router->post('/manager/add','App\Controllers\PhimsController@addPhim');
$router->get('/manager/edit/(\d+)','App\Controllers\PhimsController@showEditPhim');
$router->post('/manager/edit/(\d+)','App\Controllers\PhimsController@editPhim');
$router->get('/manager/delete/(\d+)','App\Controllers\PhimsController@xoaPhim');
$router->get('/manager/(\d+)','App\Controllers\PhimsController@showDeletePhim');

//Tìm phim theo thể loại
$router->get('/theloai/(\d+)', '\App\Controllers\PhimsController@showFollowTheLoai');

//Không tìm thấy trang yêu cầu
$router->set404('\App\Controllers\Controller@sendNotFound');
$router->run();
