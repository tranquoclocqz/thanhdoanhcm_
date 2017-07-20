<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as'=>'trangchu','uses'=>'PageController@index']);
Route::get('/danh-muc/{danhmuc}/{id}.html',['as'=>'danhmuc','uses'=>'PageController@danhmuc']);
Route::get('/chi-tiet/{slug}/{id}.html',['as'=>'chitiet','uses'=>'PageController@chitiet']);
Route::get('/404.html',['as'=>'404','uses'=>'PageController@err404']);
Route::get('/lien-he',['ad'=>'lienhe','uses'=>'PageController@lienhe']);
Route::group(['prefix'=>'ajax'],function(){
	Route::get('laythongtin/{iddanhmuc}',['as'=>'laythongtin','uses'=>'AjaxController@laythongtin']);
	Route::get('laydanhsachphuong/{idphuong}',['as'=>'laydanhsachphuong','uses'=>'AjaxController@laydanhsachphuong']);
	Route::get('laydanhsachquan/{idquan}',['as'=>'laydanhsachquan','uses'=>'AjaxController@laydanhsachquan']);

});
Route::get('admin/login',['as'=>'loginGet','uses'=>'AuthController@loginGET']);
Route::post('admin/login',['as'=>'loginPost','uses'=>'AuthController@loginPOST']);
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){

	Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@dashboard']);

	Route::get('destroy',['as'=>'destroy','uses'=>'AuthController@destroy']);

	Route::group(['prefix'=>'diadiem'],function(){
		Route::get('them',['as'=>'themdiadiemGet','uses'=>'DiadiemController@themGET']);
		Route::post('them',['as'=>'themdiadiempPost','uses'=>'DiadiemController@themPost']);
		Route::get('sua/{id}',['as'=>'suadiadiemGet','uses'=>'DiadiemController@suaGet']);
		Route::post('sua/{id}',['as'=>'suadiadiemPost','uses'=>'DiadiemController@suaGetPost']);
		Route::get('xoa/{id}',['as'=>'xoadiadiemGet','uses'=>'DiadiemController@xoaGet']);
	});

	Route::group(['prefix'=>'quan'],function(){
		Route::get('them',['as'=>'themquanGet','uses'=>'QuanController@themGET']);
		Route::post('them',['as'=>'themquanPost','uses'=>'QuanController@themPost']);
		Route::get('sua/{id}',['as'=>'suaquanGet','uses'=>'QuanController@suaGet']);
		Route::post('sua/{id}',['as'=>'suaquanPost','uses'=>'QuanController@suaGetPost']);
		Route::get('xoa/{id}',['as'=>'xoaquanGet','uses'=>'QuanController@xoaGet']);
	});

	Route::group(['prefix'=>'phuong'],function(){
		Route::get('them',['as'=>'themphuongGet','uses'=>'PhuongController@themGET']);
		Route::post('them',['as'=>'themphuongPost','uses'=>'PhuongController@themPost']);
		Route::get('sua/{id}',['as'=>'suaphuongGet','uses'=>'PhuongController@suaGet']);
		Route::post('sua/{id}',['as'=>'suaphuongPost','uses'=>'PhuongController@suaGetPost']);
		Route::get('xoa/{id}',['as'=>'xoaphuongmGet','uses'=>'PhuongController@xoaGet']);
	});

	Route::group(['prefix'=>'danhmuc'],function(){
		Route::get('them',['as'=>'themdanhmucGet','uses'=>'DanhmucController@themGET']);
		Route::post('them',['as'=>'themdanhmucPost','uses'=>'DanhmucController@themPost']);
		Route::get('sua/{id}',['as'=>'suadanhmucGet','uses'=>'DanhmucController@suaGet']);
		Route::post('sua/{id}',['as'=>'suadanhmucPost','uses'=>'DanhmucController@suaGetPost']);
		Route::get('xoa/{id}',['as'=>'xoadanhmucGet','uses'=>'DanhmucController@xoaGet']);
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('them',['as'=>'themuserGet','uses'=>'UserController@themGET']);
		Route::post('them',['as'=>'themuserPost','uses'=>'UserController@themPost']);
		Route::get('sua/{id}',['as'=>'suauserGet','uses'=>'UserController@suaGet']);
		Route::post('sua/{id}',['as'=>'suauserPost','uses'=>'UserController@suaGetPost']);
		Route::get('xoa/{id}',['as'=>'xoauserGet','uses'=>'UserController@xoaGet']);
	});

	Route::group(['prefix'=>'ajaxadmin'],function(){

	});
});
