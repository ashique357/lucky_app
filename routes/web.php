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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/profile','AdminController@profile');
Route::get('/admin/profile/edit/{id}','AdminController@profileEdit');
// Route::post('/admin/profile/edit/{id}','AdminController@profileUpdate');

Route::get('/admin/verified-request','VerifiedController@index')->name('admin.index');
Route::get('/admin/verified/accept/{id}','VerifiedController@accept');
Route::get('/admin/verified/cancel/{id}','VerifiedController@reject')->name('verify.cancel');

Route::get('/admin/choose-lucky-number','LuckyNumberController@index');
Route::post('/admin/choose-lucky-number','DrawHistoryController@draw');

Route::get('/admin/lottery-history','DrawHistoryController@index');
Route::get('/admin/draw-publish/{id}','DrawHistoryController@publish')->name('draw.publish');

Route::get('/admin/manage-users','AdminController@manageUsers');
Route::get('/admin/give-point/{id}','AdminController@givePoint');

Route::post('/admin/point-gift/{id}','AdminController@giftPoint');
Route::post('/admin/add-note/{id}','AdminController@addNote');
Route::post('/admin/change-password/{id}','AdminController@changePassword');
Route::post('/admin/change-email/{id}','AdminController@changeEmail');

Route::get('/admin/register-users','AdminController@registerUser');
Route::post('/admin/register-users','AdminController@postRegisterUser');

Route::get('/admin/user-point-history/{id}','AdminController@pointHistory');

Route::get('/admin/my-wallet','AdminController@myWallet');
Route::get('/admin/affilate','AdminController@myWallet');
Route::get('/admin/anouncement','AdminController@myWallet');

Route::get('/admin/daily-quiz','QuizController@create');
Route::post('/admin/daily-quiz','QuizController@save');

Route::post('/admin/daily-quiz/today','QuizController@get_winner');

// Route::get('/admin/daily-quiz/today','QuizController@today_question');

// Route::get('/admin/daily-refer','ReferController@get_daily_refer');


Route::get('/admin/verified-deposit','DepositController@indexRequest')->name('deposit.index');
Route::get('/admin/verified-deposit-other','DepositController@index')->name('depositOther.index');
Route::get('/admin/verified-deposit/accept/{id}','DepositController@accept');
Route::get('/admin/verified-deposit/cancel/{id}','DepositController@decline')->name('deposit.cancel');
