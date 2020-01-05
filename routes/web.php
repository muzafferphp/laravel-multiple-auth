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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Front users routes
Route::Match(['get','post'],'/user/login', 'FrontController@userLogin');
Route::group(['middleware' => 'FrontUser'], function(){
    Route::Match(['get','post'],'/user/dashboard', 'FrontController@userdashboard');
	Route::get('/user/logout', 'FrontController@userLogout');
});

//Admin controller

Route::Match(['get','post'],'/admin', 'AdminController@adminLogin');
Route::group(['middleware' => 'BackendAdmin'], function(){
    Route::Match(['get','post'],'/admin/dashboard', 'AdminController@admindashboard');
	Route::get('/admin/logout', 'AdminController@adminLogout');
});
