<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home');
Auth::routes();
Route::get('auth/activate','Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend','Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend','Auth\ActivationResendController@resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product','ProductController@index');
Route::get('/product/details/{id}','ProductController@details');
Route::get('/product/kategori/{id}','ProductController@kategori');


Route::group(['middleware'=> ['auth','checkRole:customer,admin,pemilik']],function(){

	Route::get('/profile/{name}/{id}','ProfileController@index');
	Route::get('/profile/edit/{name}/{id}','ProfileController@edit');
	Route::post('/profile/edit/{id}/perbarui','ProfileController@perbarui');
	Route::get('/profile/history/{name}/{id}','ProfileController@histori');
	Route::get('/profile/history/order/detail/{id}/{user}/{invo}','ProfileController@detail');

	Route::get('/product/addtocart/{id}/cart','CartController@addtocart');
	Route::post('/product/addtocart/{id}/cartqty','CartController@addtocartqty');
	Route::get('/product/cartview/{id_user}','CartController@tampilkeranjang');
	Route::get('/product/hapus/{id}/items','CartController@hapus');

	Route::get('/product/checkout/{id}','CartController@checkout');
	Route::get('/product/checkout/transaction/{id}','CartController@transaksi');
});

Route::group(['middleware'=> ['auth','checkRole:admin,pemilik']],function(){

	Route::get('/admin/dashboard','DashboardController@index');

	Route::get('/admin/product','ProductController@adminindex');
	Route::post('/admin/product/create','ProductController@admincreate');
	Route::get('/admin/product/{id}/edit','ProductController@adminedit');
	Route::get('/admin/product/{id}/detail','ProductController@admindetail');
	Route::get('/admin/product/{id}/hapus','ProductController@adminhapus');
	Route::post('/admin/product/{id}/perbarui','ProductController@adminperbarui');

	Route::get('/admin/customer','CustomerController@index');
	 Route::get('/admin/customer/detail/{id}','CustomerController@detail');

	Route::get('/admin/kategori','KategoriController@adminindex');
	Route::post('/admin/kategori/create','KategoriController@admincreate');
	Route::get('/admin/kategori/{id}/edit','KategoriController@adminedit');
	Route::get('/admin/kategori/{id}/hapus','KategoriController@adminhapus');
	Route::post('/admin/kategori/{id}/perbarui','KategoriController@adminperbarui');

	Route::get('/admin/inorder','OrderController@index');
	Route::get('/admin/inorder/detail/{beli}/{user}/{info}','OrderController@Detail');

});

Route::group(['middleware'=> ['auth','checkRole:pemilik']],function(){

		Route::get('/admin/user','UserController@index');
		Route::get('/admin/user/detail/{id}','UserController@detail');
		Route::post('/admin/user/detail/{id}/perbarui','UserController@update');

		Route::post('/admin/customer/detail/{id}/perbarui','CustomerController@update');
		Route::get('/admin/customer/detail/{id}/edit','CustomerController@edit');
});

