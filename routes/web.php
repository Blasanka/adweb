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

Route::get('log', [
    'uses' => 'FirebaseAuthController@index',
<<<<<<< HEAD
    'as' => 'log'
=======
    'as' => 'log',
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
]);

Route::get('ads/{title}', [
    'uses' => 'FirebaseController@showAd',
    'as' => 'ads.show',
]);

Auth::routes();

Route::post('login', 'FirebaseAuthController@login');
Route::post('logout', 'FirebaseAuthController@logout')->name('logout');

Route::get('/dashboard', [
    'uses' => 'HomeController@index',
    'as' => 'dashboard',
]);

<<<<<<< HEAD

=======
>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    // Dashboard
    Route::get('/ads', 'HomeController@getAds')->name('ads');
    Route::get('/users', 'HomeController@getUsers')->name('users');
<<<<<<< HEAD
=======

    Route::get('ad/{title}', [
        'uses' => 'FirebaseController@showAd',
        'as' => 'ad.show',
    ]);

    Route::get('users/{email}', [
        'uses' => 'FirebaseController@showUser',
        'as' => 'user.show',
    ]);

    Route::get('/users/userid/{uid}', 'FirebaseController@disableUser')->name('users.userid');
    Route::get('/users/delete/{uid}', 'FirebaseController@deleteUser')->name('users.delete');

    Route::get('/ads/{title}', 'FirebaseController@disableAd')->name('ads.title');
    Route::get('/ads/delete/{title}', 'FirebaseController@deleteAd')->name('ads.delete');

>>>>>>> f84831e2a64af15656a8f3797b32d30cf62786f0
});
