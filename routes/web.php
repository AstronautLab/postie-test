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

Route::get('/', 'InstagramUsersController@index')->name('instagram-users.index');
Route::get('/{userName}', 'InstagramUsersController@show')->name('instagram-users.show');

Route::get('/{userName}/{mediaId}','InstagramUserImagesController@show')->name('instagram-user-image.show');

Route::post('/{userName}/{mediaId}/send-email-score','SendScoreEmailToInstagramUserController@store')->name('instagram-send-email-score.store');