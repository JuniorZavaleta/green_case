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

Route::group(['namespace' => 'App'], function () {
    Route::get('/', 'IndexController@index')->name('complaint.index');
    Route::post('/ocultar_mensaje', 'IndexController@hideSupportMessage')->name('index.hide_message');
    Route::get('/siguientes_casos', 'IndexController@nextComplaints')->name('index.next_complaints');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/nuevo_caso', 'ComplaintController@create')->name('complaint.create');
        Route::post('/nuevo_caso', 'ComplaintController@store')->name('complaint.store');
        Route::get('caso/{complaint}/actividades', 'ComplaintController@getActivities')->name('complaint.activities');
    });

    Route::get('/login', 'FacebookController@login')->name('login');
    Route::get('/facebook/login', 'FacebookController@redirect')->name('facebook.login');
    Route::get('/facebook/callback', 'FacebookController@callback')->name('facebook.callback');
    Route::get('/logout', 'FacebookController@logout')->name('citizen.logout');
});

Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function () {
    Route::get('/casos', ['as' => 'admin.complaint.index', 'uses' => 'ComplaintController@index']);
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.show_login_form');
    Route::post('/login', 'AuthController@login')->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/casos', 'ComplaintController@index')->name('admin.complaint.index');
        Route::get('/casos/exportar', 'ComplaintController@export')->name('admin.complaint.export');
        Route::get('/casos/{complaint}', 'ComplaintController@show')->name('admin.complaint.show');
        Route::get('/casos/evaluar/{complaint}', 'ComplaintController@getEvaluate')->name('admin.complaint.evaluate');
        Route::get('/casos/accepted/{complaint}', 'ComplaintController@accepted')->name('admin.complaint.accepted');
        Route::post('/casos/rejected/{complaint}', 'ComplaintController@rejected')->name('admin.complaint.rejected');

        Route::get('/casos/{complaint}/actividades', 'ActivityController@index')->name('admin.activity.index');
        Route::get('/casos/{complaint}/actividades/nuevo', 'ActivityController@create')->name('admin.activity.create');
        Route::post('/casos/{complaint}/actividades/nuevo', 'ActivityController@store')->name('admin.activity.store');
        Route::get('/casos/{complaint}/actividades/{activity}', 'ActivityController@show')->name('admin.activity.show');
        Route::get('/casos/{complaint}/actividades/{activity}/editar', 'ActivityController@edit')->name('admin.activity.edit');
        Route::post('/casos/{complaint}/actividades/{activity}/editar', 'ActivityController@update')->name('admin.activity.update');

        Route::get('/autoridades', 'AuthorityController@index')->name('admin.authority.index');
        Route::get('/autoridades/nueva', 'AuthorityController@create')->name('admin.authority.create');
        Route::post('/autoridades/nueva', 'AuthorityController@store')->name('admin.authority.store');

        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    });
});
