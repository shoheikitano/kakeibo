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

Route::group(['middleware' => 'auth'], function() {
  Route::get('/days/{id}/shushies', 'ShushiController@index')->name('shushies.index');

  Route::get('/days/create', 'DayController@showCreateForm')->name('days.create');
  Route::post('/days/create', 'DayController@create');

  Route::get('/days/{id}/shushies/create', 'ShushiController@showCreateForm')->name('shushies.create');
  Route::post('/days/{id}/shushies/create', 'ShushiController@create');

  Route::get('/days/{id}/shushies/{shushi_id}/edit', 'ShushiController@showEditForm')->name('shushies.edit');
  Route::post('/days/{id}/shushies/{shushi_id}/edit', 'ShushiController@edit');

  Route::get('/', 'HomeController@index')->name('home');

});
Auth::routes();
