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
Route::get('/', function () {return view('main/index');});
Route::get('/heroes', 'App\Http\Controllers\heroes@getListHeroes');
Route::get('/heroDetails/{id}', 'App\Http\Controllers\heroes@getDetailHero');
Route::get('/gallery', function () {return view('main/gallery');});



Route::get('/KiemVo', function () {return view('KiemVo.apk');});
Route::get('/login', function () {return view('login');});
