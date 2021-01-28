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

Route::get('/', 'AuthController@home')->name('home');

Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/register', function () { return view('register'); })->name('register');
Route::get('/logout', "AuthController@logout")->name('logout');
Route::get('/tokens', "AuthController@tokens")->name('tokens');
Route::delete('/tokens/{name}', "AuthController@tokenDel")->name('token-del');
Route::get('/my-stats', "StatsController@statsMy")->name('my-stats');
Route::get('/stats', "StatsController@stats")->name('stats');


Route::post('/register', "AuthController@register");
Route::post('/login', "AuthController@login");

Route::get('/bot', function () { return view('botman'); })->name('bot');
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
