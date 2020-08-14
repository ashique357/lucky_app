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


Auth::routes(['register' => false]);

Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/profile','AdminController@profile');
Route::get('/admin/profile/edit/{id}','AdminController@profileEdit');
// Route::post('/admin/profile/edit/{id}','AdminController@profileUpdate');

Route::get('/admin/verified-request','VerifiedController@index')->name('admin.index');
Route::get('/admin/verified/accept/{id}','VerifiedController@accept');
Route::get('/admin/verified/cancel/{id}','VerifiedController@reject')->name('verify.cancel');


