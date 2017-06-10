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
Route::get('/nuevo_caso', ['as' => 'complaint.create', 'uses' => 'ComplaintController@create']);
Route::post('/nuevo_caso', ['as' => 'complaint.store', 'uses' => 'ComplaintController@store']);
Route::get('/', 'ComplaintController@index')->name('complaint.index');

Route::get('/login', 'FacebookController@login')->name('login');
Route::get('/facebook/login', 'FacebookController@redirect')->name('facebook.login');
Route::get('/facebook/callback', 'FacebookController@callback')->name('facebook.callback');
Route::get('/logout', 'FacebookController@logout')->name('citizen.logout');

Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function () {
    Route::get('/casos', ['as' => 'admin.complaint.index', 'uses' => 'ComplaintController@index']);
});
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.show_login_form');
    Route::post('/login', 'AuthController@login')->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/casos', 'ComplaintController@index')->name('admin.complaint.index');
        Route::get('/casos/exportar', 'ComplaintController@export')->name('admin.complaint.export');
        Route::get('/casos/{complaint}', 'ComplaintController@show')->name('admin.complaint.show');

        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    });
});
