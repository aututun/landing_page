<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/', function () {return view('main/index');});
Route::get('/heroes', 'App\Http\Controllers\Heroes@getListHeroes');
Route::get('/heroDetails/{id}', 'App\Http\Controllers\Heroes@getDetailHero');
Route::get('/gallery', function () {return view('main/gallery');});

Route::get('/account', 'App\Http\Controllers\User@getDetailsUser');
//Route::get('/connections', function () {return view('cms/connections');});
Route::get('/changePassword', function () {return view('cms/changePassword');});
Route::get('/listGiftCode', 'App\Http\Controllers\Dashboard@listGiftCode');
Route::get('/editGiftCode/{id}', 'App\Http\Controllers\Money@editGiftCode');
Route::post('/postGiftCode',  'App\Http\Controllers\Money@postGiftCode');
Route::get('/login',  'App\Http\Controllers\Dashboard@checkLogin');
Route::get('/listUser/{page}',  'App\Http\Controllers\User@getListUser');
Route::get('/dashboard',  'App\Http\Controllers\Dashboard@checkLogin');
Route::get('/logout', 'App\Http\Controllers\User@logout');
Route::post('/loginPost', 'App\Http\Controllers\User@postLogin');
Route::post('/signUpPost', 'App\Http\Controllers\User@postSignUp');
Route::post('/postChangePassword', 'App\Http\Controllers\User@postChangePassword');
Route::post('/postChangeInfo', 'App\Http\Controllers\User@postChangeInfo');
Route::post('/congKTcoin', 'App\Http\Controllers\Money@congKTcoin');
Route::post('/truKTcoin', 'App\Http\Controllers\Money@truKTcoin');

Route::post('/napKTCoin', 'App\Http\Controllers\Money@postNapKTCoin');
Route::post('/napDong', 'App\Http\Controllers\Money@postNapDong');
Route::get('/getListBankLog', 'App\Http\Controllers\Money@getListBankLog');
Route::get('/getListCardLog', 'App\Http\Controllers\Money@getListBankLog');
Route::get('/giftCodeRep', 'App\Http\Controllers\Money@getGiftCodeRep');


Route::get('/clear-cache-all', function() {Artisan::call('cache:clear');dd("Cache Clear All");});
