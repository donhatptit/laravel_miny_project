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


    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\LoginController@getLogin');
    Route::get('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['adminlogin']], function() {

    Route::group(['prefix' => 'user'], function()
    {
        Route::get('quan-ly-nguoi-dung', 'Admin\UserController@listUser')->name('user.manager');
        Route::get('them-nguoi-dung', 'Admin\UserController@create')->name('user.add');
        Route::post('them-nguoi-dung', 'Admin\UserController@store');

        Route::get('sua/{id}', 'Admin\UserController@edit');
        Route::post('sua/{id}', 'Admin\UserController@update')->name('user.update');

        Route::get('xoa-{user_id}', 'Admin\UserController@destroy');
    });
    Route::group(['prefix' => 'category'], function()
    {
        Route::get('quan-ly-lop', 'Admin\CategoryController@index')->name('category.manager');
        Route::get('them-lop', 'Admin\CategoryController@create')->name('category.add');
        Route::post('them-lop', 'Admin\CategoryController@store');

        Route::get('sua/{id}', 'Admin\CategoryController@edit');
        Route::post('sua/{id}', 'Admin\CategoryController@update')->name('cate.update');

        Route::get('xoa-{id}', 'Admin\CategoryController@destroy');

    });

    Route::group(['prefix' => 'subject'], function()
    {
        Route::get('quan-ly-mon-hoc', 'Admin\SubjectController@index')->name('subject.manager');
        Route::get('them-mon-hoc', 'Admin\SubjectController@create')->name('subject.add');
        Route::post('them-mon-hoc', 'Admin\SubjectController@store');

        Route::get('sua/{id}', 'Admin\SubjectController@edit');
        Route::post('sua/{id}', 'Admin\SubjectController@update')->name('sub.update');

        Route::get('xoa-{id}', 'Admin\SubjectController@destroy');

    });
  
    Route::group(['prefix' => 'post'], function()
    {
        Route::get('quan-ly-bai-viet', 'Admin\PostController@index')->name('post.manager');
        Route::get('them-bai-viet', 'Admin\PostController@create')->name('post.add');
        Route::post('them-bai-viet', 'Admin\PostController@store');

        Route::get('sua/{id}', 'Admin\PostController@edit');
        Route::post('sua/{id}', 'Admin\PostController@update')->name('post.update');

        Route::get('xoa/{id}', 'Admin\PostController@destroy');

    });




});

//Client
Route::get('/trang-chu', 'Client\PageController@index');
Route::get('lop-{class_id}', 'Client\CategoryController@index')->name('category.name');
Route::get('lop-{class_id}/{subject_id}/{p}', 'Client\CategoryController@getDetail')->name('subject.name');
Route::get('moi-nhat/{p}', 'Client\CategoryController@getLastest');
Route::get('/chi-tiet/{post_id}/{subject_id}', 'Client\DetailController@index')->name('post.name');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/breadcurmbs/{type}/{id}', 'Client\DetailController@rendBreadcurmbs');
Route::get('/breadcurmbs-category/{type}/{id}', 'Client\CategoryController@breadcurmbs');
Route::get('/breadcurmbs-subject/{type}/{id}', 'Client\CategoryController@Subjectbreadcurmbs');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
