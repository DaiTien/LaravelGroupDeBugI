<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//get list user
Route::get('/user', 'UserManagerController@index');
//get one item by id
Route::get('/user/{id}', 'UserManagerController@show');
//create new record
Route::post('/user', 'UserManagerController@store');
//update item
Route::put('user/{id}', 'UserManagerController@update');
//delete item
Route::delete('user/{id}', 'UserManagerController@delete');

//get list post
Route::get('posts', 'Api\PostController@index')->name('list-post');
//create post
Route::get('posts/create', 'Api\PostController@create')->name('create-post');
//save new post
Route::post('posts', 'Api\PostController@store')->name('save-post');
