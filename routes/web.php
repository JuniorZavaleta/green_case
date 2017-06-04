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

Route::get('/', ['as' => 'complaint.index', 'uses' => 'ComplaintController@index']);

Route::get('/login', ['as' => 'login', 'uses' => 'FacebookController@login']);
Route::get('/facebook/login', ['as' => 'facebook.login', 'uses' => 'FacebookController@redirect']);
Route::get('/facebook/callback', ['as' => 'facebook.callback', 'uses' => 'FacebookController@callback']);

Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function () {
    Route::get('/casos', ['as' => 'admin.complaint.index', 'uses' => 'ComplaintController@index']);

    Route::get('/login', ['as' => 'admin.login.form', 'uses' => function () {
        return view('admin.auth.login');
    }]);
});
