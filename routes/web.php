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
Route::get('/', [
    'uses' => 'FirebaseController@index',
    'as' => 'home',
]);

Route::get('ads/{title}', [
    'uses' => 'FirebaseController@showAd',
    'as' => 'ads.show',
]);

Auth::routes();

Route::get('/dashboard', [
    'uses' => 'HomeController@index',
    'as' => 'dashboard',
]);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    // Dashboard
    Route::get('/ads', 'HomeController@getAds')->name('ads');
    Route::get('/users', 'HomeController@getUsers')->name('users');
});
