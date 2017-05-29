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

Route::get('/login', ['as' => 'login', 'uses' => 'FacebookController@login']);
Route::get('/facebook/login', ['as' => 'facebook.login', 'uses' => 'FacebookController@redirect']);
Route::get('/facebook/callback', ['as' => 'facebook.callback', 'uses' => 'FacebookController@callback']);
