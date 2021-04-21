<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
// Auth::routes(['verify' =>  true]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/reload','HomeController@reload');
Route::post('/user/track', 'HomeController@getDok');

// Route Login
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/postlogin', 'HomeController@postlogin');
Route::get('/signup', 'HomeController@signup');
Route::get('logout','HomeController@logout');
Route::post('/postsignup', 'HomeController@postsignup');

// Auth User Biasa dan Admin
Route::group(['middleware' => ['auth','checkRole:1,2']],function(){
    Route::get('/upload','UploadController@index')->name('upload');
    Route::post('/upload','UploadController@store');

    Route::get('/change-password', 'HomeController@changePassword');
    Route::post('/change-password', 'HomeController@updatePassword');
    Route::post('/password/verify_old_pass', 'HomeController@verify_old_password');
    
});

// Auth Admin
Route::group(['middleware' => ['auth','checkRole:1']],function(){ 
    Route::get('/admin/user','UserController@index');
    Route::post('/admin-user','UserController@store');
    Route::post('/admin-user/status','UserController@status');
    Route::patch('/dokumen/{id}/status', 'AdminController@status')->name('update.status');

    // Status
    Route::patch('/admin/{id}/reject', 'AdminController@reject')->name('reject.status');
    Route::get('/admin/approve/{id}','AdminController@approve');

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/dokumen', 'AdminController@dokumen');
    Route::get('/detail/{id}/dokumen', 'AdminController@detail')->name('detail.dokumen');

    // Upload
    Route::post('/dokumen/upload-balasan', 'AdminController@storeDokumen');
    Route::post('/dokumen/edit-balasan', 'AdminController@editDetailDokumen');
    Route::get('/dokumen/delete-balasan/{id}', 'AdminController@deleteDetailDokumen');

    // Download
    Route::get('/download/dokumen/{id}', 'AdminController@download');

    // Kirim Email Dokumen Selesai
    Route::get('/dokumen/notifemail/{id}','AdminController@emailDok');

    // Contact
    Route::get('/contact', function(){ return view('admin.contact'); });

    // History
    /* Admin seksi */
    Route::get('/admin/approved','AdminController@riwayatApproved');
    Route::get('/admin/rejected','AdminController@riwayatrejected');
    Route::get('/admin/delete/rejected/{id}', 'AdminController@deleteRejectedById');
    Route::get('/admin/delete/rejected', 'AdminController@deleteRejectedAll');
    Route::get('/admin/delete/approved/{id}', 'AdminController@deleteApprovedById');
    Route::get('/admin/delete/approved', 'AdminController@deleteApprovedAll');

    /* Super Admin dan sekretaris */
    Route::get('/admin/history/selesai', 'AdminController@selesai');
    Route::get('/admin/history/ditolak', 'AdminController@ditolak');
    Route::get('/admin/delete/ditolak/{id}', 'AdminController@deleteDitolakById');
    Route::get('/admin/delete/ditolak', 'AdminController@deleteDitolakAll');
    Route::get('/admin/delete/selesai/{id}', 'AdminController@deleteSelesaiById');
    Route::get('/admin/delete/selesai', 'AdminController@deleteSelesaiAll');
});