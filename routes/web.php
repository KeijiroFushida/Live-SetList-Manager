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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','EventController@index');

Route::prefix('event')->group(function() {
    Route::get('/{id}', 'EventController@getEventDetail');
});

Route::prefix('artist')->group(function() {
    Route::get('/', 'ArtistController@list');
    Route::post('save/{id?}', 'ArtistController@save');
});
