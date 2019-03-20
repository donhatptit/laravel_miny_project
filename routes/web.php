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
//Admin


//Client
Route::get('/trang-chu', 'Client\PageController@index');
Route::get('lop-{class_id}', 'Client\CategoryController@index');
Route::get('lop-{class_id}/{subject_id}/{p}', 'Client\CategoryController@getDetail');
Route::get('moi-nhat/{p}', 'Client\CategoryController@getLastest');
Route::get('/chi-tiet/{post_id}/{subject_id}', 'Client\DetailController@index');
