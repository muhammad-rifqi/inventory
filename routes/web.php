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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/product/create', 'HomeController@store');
Route::get('/admin/deleteproduct/{id}', 'HomeController@destroy');
Route::get('/admin/editproduct/{id}', 'HomeController@edit');
Route::post('/admin/product/update/{id}', 'HomeController@update');


Route::get('/admin/school', 'SchoolController@index');
Route::get('/admin/school/create', 'SchoolController@create');
Route::get('/admin/sekolah/kota/{id}', 'SchoolController@kota');
Route::get('/admin/sekolah/kecamatan/{id}', 'SchoolController@kecamatan');
Route::post('/admin/school/store', 'SchoolController@store');
Route::get('/admin/deleteschool/{id}', 'SchoolController@destroy');
Route::get('/admin/detailschool/{id}', 'SchoolController@show');
Route::get('/admin/product/download/{id}/{type}', 'SchoolController@download');
Route::get('/admin/school/print/{id}', 'SchoolController@print');

Route::get('/admin/rekening', 'RekeningController@index');
Route::post('/admin/rekening/create', 'RekeningController@store');
Route::get('/admin/deleterekening/{id}', 'RekeningController@destroy');
Route::get('/admin/editrekening/{id}', 'RekeningController@edit');
Route::post('/admin/rekening/update/{id}', 'RekeningController@update');

