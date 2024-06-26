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

// Common route
Route::get('/', function () {return view('main/index');});
Route::get('/heroes', 'App\Http\Controllers\Heroes@getListHeroes');
Route::get('/heroDetails/{id}', 'App\Http\Controllers\Heroes@getDetailHero');
Route::get('/gallery', function () {return view('main/gallery');});
Route::get('/gioithieu', function () {return view('main/gioithieu');});


// Server route
Route::get('/listServer', function () {return view('cms/listServer')->with('serverDetails',false);});
Route::get('/serverDetails/{serverID}', 'App\Http\Controllers\Dashboard@getServerDetails');
Route::get('/listFile/{location}', 'App\Http\Controllers\Dashboard@getFile');


// Money route
Route::get('/historyKVcoin/{toUserID}', 'App\Http\Controllers\Money@getHistoryKTcoin');
Route::post('/congKTcoin', 'App\Http\Controllers\Money@congKTcoin');
Route::post('/truKTcoin', 'App\Http\Controllers\Money@truKTcoin');
Route::post('/napKTCoin', 'App\Http\Controllers\Money@postNapKTCoin');
Route::post('/napDong', 'App\Http\Controllers\Money@postNapDong');
Route::post('/createUrl', 'App\Http\Controllers\Money@createUrl');
Route::get('/cancelBuyUrl', 'App\Http\Controllers\Money@cancelBuy');
Route::get('/getListBankLog', 'App\Http\Controllers\Money@getListBankLog');
Route::get('/getListCardLog', 'App\Http\Controllers\Money@getListBankLog');


// Giftcode route
Route::get('/giftCodeRep', 'App\Http\Controllers\Money@getGiftCodeRep');
Route::get('/listGiftCode', 'App\Http\Controllers\Dashboard@listGiftCode');
Route::get('/editGiftCode/{id}', 'App\Http\Controllers\Money@editGiftCode');
Route::get('/deleteGiftCode/{id}', 'App\Http\Controllers\Money@deleteGiftCode');
Route::post('/postGiftCode',  'App\Http\Controllers\Money@postGiftCode');


// Category cms route
Route::get('/listCategories', 'App\Http\Controllers\Dashboard@getListCategories');
Route::get('/editCategory/{id}', 'App\Http\Controllers\Dashboard@getCategoryDetails');
Route::post('/postCategory', 'App\Http\Controllers\Dashboard@getUpdateCategoryDetails');
Route::get('/deleteCategory/{id}', 'App\Http\Controllers\Dashboard@getDeleteCategory');


// Category user route
Route::get('/category/{id}', 'App\Http\Controllers\Dashboard@getListNewsByCategories');


// News route
Route::get('/listNews', 'App\Http\Controllers\Dashboard@getListNews');
Route::get('/listNews/filter', 'App\Http\Controllers\Dashboard@getListNewsByFilter');
Route::get('/editNews/{id}', 'App\Http\Controllers\Dashboard@getNewsDetails');
Route::post('/postNews', 'App\Http\Controllers\Dashboard@getUpdateNewsDetails');
Route::get('/deleteNews/{id}', 'App\Http\Controllers\Dashboard@getDeleteNews');
Route::get('/news', 'App\Http\Controllers\Dashboard@getNews');
Route::get('/newsDetails/{id}', 'App\Http\Controllers\Dashboard@getNewsDetailsView');


// User route
//Route::get('/connections', function () {return view('cms/connections');});
Route::get('/changePassword', function () {return view('cms/changePassword');});
Route::get('/login','App\Http\Controllers\Dashboard@checkLogin');
Route::get('/listUser/{page}','App\Http\Controllers\User@getListUser');
Route::get('/dashboard','App\Http\Controllers\Dashboard@checkLogin');
Route::get('/logout','App\Http\Controllers\User@logout');
Route::post('/loginPost','App\Http\Controllers\User@postLogin');
Route::post('/signUpPost','App\Http\Controllers\User@postSignUp');
Route::post('/postChangePassword','App\Http\Controllers\User@postChangePassword');
Route::post('/postChangeInfo','App\Http\Controllers\User@postChangeInfo');
Route::post('/postCreateAccount','App\Http\Controllers\User@postCreateAccount');
Route::post('/listUserByName','App\Http\Controllers\User@listUserByName');
Route::get('/account','App\Http\Controllers\User@getDetailsUser');
Route::get('/createAccount', function () {return view('cms/createAccountForm');});


// Other
Route::get('/clear-cache-all', function() {Artisan::call('cache:clear');dd("Cache Clear All");});
