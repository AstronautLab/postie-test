<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('instagram/auth', 'InstagramController@auth');
Route::get('/users', 'UserController@index');
Route::get('/images/{username}', 'ImageController@getByUsername')->where('username', '\D+');
Route::get('/images/{id}', 'ImageController@get')->where('id', '[0-9]+');
