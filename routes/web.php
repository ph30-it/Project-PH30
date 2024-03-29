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

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin-form-login');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin-login');
Route::get('admin/home', 'Admin\HomeController@index')->name('admin-home');
Route::get('/upload', 'HomeController@formUpload')->name('form-upload');
Route::post('/upload', 'HomeController@upload')->name('upload');
Route::get('/send-mail', 'HomeController@formMail')->name('form-mail');
Route::post('/send-mail', 'HomeController@sendMail')->name('send-mail');
Route::get('product/{id}/show-image', 'ProductController@show')->name('show-image');




