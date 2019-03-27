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


    Route::get('admin/login', 'Auth\LoginController@LoginForm')->name('admin.login');
    Route::post('admin/home', 'Auth\LoginController@getLogin');
    Route::get('admin/logout', 'Auth\LoginController@getLogout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function() {
    Route::get('home', 'Auth\LoginController@adminHome')->name('admin.home');
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

    Route::group(['prefix' => 'user'], function()
    {
        Route::get('quan-ly-nguoi-dung', 'Admin\UserController@listUser')->name('user.manager');
        Route::get('them-nguoi-dung', 'Admin\UserController@create')->name('user.add');
        Route::post('them-nguoi-dung', 'Admin\UserController@store');

        Route::get('sua/{id}', 'Admin\UserController@edit');
        Route::post('sua/{id}', 'Admin\UserController@update')->name('user.update');

        Route::get('xoa-{user_id}', 'Admin\UserController@destroy');
    });


});

//Client
Route::get('/trang-chu', 'Client\PageController@index');
Route::get('lop-{class_id}', 'Client\CategoryController@index');
Route::get('lop-{class_id}/{subject_id}/{p}', 'Client\CategoryController@getDetail');
Route::get('moi-nhat/{p}', 'Client\CategoryController@getLastest');
Route::get('/chi-tiet/{post_id}/{subject_id}', 'Client\DetailController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
