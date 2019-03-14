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
Route::get('/trang-chu', 'client\PageController@index');
//Route::get('lop-{id}', 'client\CategoryController@index');
Route::get('/chi-tiet/{post_id}/{subject_id}', 'client\DetailController@index');
