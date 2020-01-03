<?php

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
Route::get('/', 'Controller@teste')->name('profile');

Route::get('/card', 'Controller@playerCard')->name('card');

Route::get('/ajax_get_profile', 'Controller@ajax_player_profile')->name('ajax_get_profile');

Route::get('/vote', function () {
    return view('vote');
});

Route::get('/ajax_get_players', 'Controller@ajax_get_players')->name('ajax_get_players');

/*Route::get('/', function () {
    
    //return view('welcome');
});*/
