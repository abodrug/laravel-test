<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'throttle:3,1', 'api.hit'])->group(function () {
    Route::get('/episodes', 'Api\EpisodeController@getEpisodes');
    Route::get('/episodes/{id}', 'Api\EpisodeController@getEpisodeById')->where('id', '[0-9]+');

    Route::get('/characters', 'Api\CharacterController@getCharacters');
    Route::get('/characters/random', 'Api\CharacterController@getCharacterRandom');

    Route::get('/quotes', 'Api\QuoteController@getQuotes');
    Route::get('/quotes/random', 'Api\QuoteController@getQuotesRandomByAuthor');

    Route::get('/my-stats', "Api\StatsController@statsMy")->name('my-stats');
    Route::get('/stats', "Api\StatsController@stats")->name('stats');
});
