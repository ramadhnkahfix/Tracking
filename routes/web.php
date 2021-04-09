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

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/tracking', function(){
//     return view('layouts.home');
// });

// Route Login
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/postlogin', 'HomeController@postlogin');
Route::get('/signup', 'HomeController@signup');
Route::get('logout','HomeController@logout');
Route::post('/postsignup', 'HomeController@postsignup');

Route::group(['middleware' => ['auth','checkRole:1,2']],function(){
    Route::get('/upload','UploadController@index')->name('upload');
    Route::post('/upload','UploadController@store');

    Route::get('/change-password', 'HomeController@changePassword');
    Route::post('/change-password', 'HomeController@updatePassword');
    Route::post('/password/verify_old_pass', 'HomeController@verify_old_password');
    // Route dhani
});
Route::group(['middleware' => ['auth','checkRole:1']],function(){ 
    Route::get('/admin/user','UserController@index');
    Route::post('/admin-user','UserController@store');








    // Route Dimas
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/dokumen', 'AdminController@dokumen');
    Route::get('/detail/{id}/dokumen', 'AdminController@detail')->name('detail.dokumen');

    //Download
    Route::get('/download/dokumen/{id}', 'AdminController@download');


});