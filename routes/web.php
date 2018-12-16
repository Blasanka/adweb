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

Auth::routes();

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
   // Dashboard
   Route::get('/', [
      'uses' => 'HomeController@index',
      'as' => 'home'
  ]);
   Route::get('/ads', 'HomeController@getAds')->name('ads');
   Route::get('/users', 'HomeController@getUsers')->name('users');
});