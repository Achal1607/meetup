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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{user}','ProfileController@index')->name('profiles.show');
Route::get('/profile/{user}/edit','ProfileController@edit')->name('profiles.edit');
Route::patch('/profile/{user}','ProfileController@update')->name('profiles.update');

Auth::routes();
Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

