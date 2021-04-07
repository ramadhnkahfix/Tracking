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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('layouts.home');
});
Route::get('/upload','UploadController@index');

// Route Login
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/postlogin', 'HomeController@postlogin');
Route::get('/signup', 'HomeController@signup');
Route::get('logout','HomeController@logout');
Route::post('/postsignup', 'HomeController@postsignup');

Route::post('/upload','UploadController@store')->middleware('auth');
Route::group(['middleware' => ['auth']],function(){
// Route dhani

    Route::get('/admin/user','UserController@index');
    Route::post('/admin-user','UserController@store');
















    // Route Dimas
    Route::get('/admin', 'AdminController@index');
    Route::get('/dokumen', 'AdminController@dokumen');
    Route::get('/detail', 'AdminController@detail');

});