<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('Template.admin_layout');
});

Auth::routes();

Route::get('/home', 'HomeController@layout')->name('home');
Route::get('/logout', 'HomeController@Logout');
//quản lý sản phẩm
//list nhóm sản phẩm
Route::get('list-product-category', 'ProductCategoryController@GetAll');
//form create
Route::get('create-product-category', 'ProductCategoryController@AddProductCategory');
//save create
Route::post('save-product-category', 'ProductCategoryController@SaveProductCategory');
//form update
Route::get('update-product-category/{id}', 'ProductCategoryController@UpdateProductCategory');
//save update
Route::post('save-update-produc-category', 'ProductCategoryController@SaveUpdateProductCategory');
//delete
Route::get('delete-product-category/{id}', 'ProductCategoryController@DeleteProductCategory');
