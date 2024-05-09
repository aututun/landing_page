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



Route::get('/login', function () {return view('main/login');});
Route::post('/loginPost', 'App\Http\Controllers\User@postLogin');
Route::post('/signUpPost', 'App\Http\Controllers\User@postSignUp');

Route::get('/dashboard', function () {return view('cms/dashboard');});





Route::get('/clear-cache-all', function() {Artisan::call('cache:clear');dd("Cache Clear All");});
