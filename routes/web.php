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

Route::get('/', 'HomeController@index');
Route::get('/upload','UploadController@index');

// Route Login
Route::get('/login', 'HomeController@login');
Route::post('/postlogin', 'HomeController@postLogin');
Route::get('logout','HomeController@logout');

// Route Dhani

















// Route Dimas