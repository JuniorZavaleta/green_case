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

Route::get('/', 'ComplaintController@index')->name('complaint.index');

Route::get('/login', 'FacebookController@login')->name('login');
Route::get('/facebook/login', 'FacebookController@redirect')->name('facebook.login');
Route::get('/facebook/callback', 'FacebookController@callback')->name('facebook.callback');
Route::get('/logout', 'FacebookController@logout')->name('citizen.logout');

Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.show_login_form');
    Route::post('/login', 'AuthController@login')->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/casos', 'ComplaintController@index')->name('admin.complaint.index');
        Route::get('/casos/{complaint}', 'ComplaintController@show')->name('admin.complaint.show');
        Route::get('/casos/evaluar/{complaint}', 'ComplaintController@getEvaluate')->name('admin.complaint.evaluate');
        Route::get('/casos/accepted/{complaint}', 'ComplaintController@accepted')->name('admin.complaint.accepted');
        Route::get('/casos/rejected/{complaint}', 'ComplaintController@rejected')->name('admin.complaint.rejected');

        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    });
});
