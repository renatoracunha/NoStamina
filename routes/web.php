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

Route::get('/card/{player_id}', 'Controller@playerCard')->name('card');

Route::get('/ajax_get_profile', 'Controller@ajax_player_profile')->name('ajax_get_profile');

Route::get('/vote', function () {
    return view('vote');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/ajax_register_player', 'Controller@ajax_register_player')->name('ajax_register_player');

Route::post('/upload_imagem', 'Controller@upload_imagem')->name('upload_imagem');

Route::get('/ajax_get_players', 'Controller@ajax_get_players')->name('ajax_get_players');

Route::get('/ajax_rate_player', 'Controller@ajax_rate_player')->name('ajax_rate_player');

/*Route::post('/upload_imagem', function (Request $request) {
    print_r($request);exit;
    //return view('welcome');
})->name('upload_imagem');*/
