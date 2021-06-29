<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

// Route::get('/', function () {

//     // Alert::success('hello');
//     return view('Template.admin_layout');
// });
//Route::get('/admin', 'HomeController@index')->name('home');
//change language
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'HomeController@ChangLanguage')
        ->name('user.change-language');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/home', 'Admin\HomeController@layout')->name('home');
    Route::get('/logout', 'Admin\HomeController@Logout');
    Route::group(['prefix' =>'movie-category'], function (){
        Route::get('list', 'Admin\MovieCategoryController@index')->name('moviecategory.index');
        Route::get('create', 'Admin\MovieCategoryController@create')->name('moviecategory.create');
        Route::post('save-create', 'Admin\MovieCategoryController@store')->name('moviecategory.store');
        Route::get('update/{id}', 'Admin\MovieCategoryController@edit')->name('moviecategory.edit');
        Route::post('save-update', 'Admin\MovieCategoryController@update')->name('moviecategory.update');
        Route::get('delete/{id}', 'Admin\MovieCategoryController@DeleteMovieCategory')->name('moviecategory.delete');

    });
//    Route::get('movie-category', 'Admin\MovieCategoryController@index')->name('moviecategory.index');
//    Route::get('movie-category/create', 'Admin\MovieCategoryController@create')->name('moviecategory.create');
//    Route::post('movie-category/create', 'Admin\MovieCategoryController@store')->name('moviecategory.store');
//    Route::get('movie-category/update/{id}', 'Admin\MovieCategoryController@edit')->name('moviecategory.edit');
//    Route::post('movie-category/save-update', 'Admin\MovieCategoryController@update')->name('moviecategory.update');
//    Route::get('/delete-movie-category/{id}','Admin\MovieCategoryController@DeleteMovieCategory')->name('moviecategory.delete');
});

Auth::routes();

//Route::get('/home', 'HomeController@layout')->name('home');
//Route::get('/logout', 'HomeController@Logout');
//quản lý sản phẩm
//list nhóm sản phẩm
//Route::get('list-product-category', 'ProductCategoryController@GetAll');
////form create
//Route::get('create-product-category',
//    'ProductCategoryController@AddProductCategory');
////save create
//Route::post('save-product-category',
//    'ProductCategoryController@SaveProductCategory');
////form update
//Route::get('update-product-category/{id}',
//    'ProductCategoryController@UpdateProductCategory');
////save update
//Route::post('save-update-product-category',
//    'ProductCategoryController@SaveUpdateProductCategory');
////delete
//Route::get('delete-product-category/{id}',
//    'ProductCategoryController@DeleteProductCategory');
////update active
//Route::get('update-status-product-category',
//    'ProductCategoryController@UpdateStatus');
//
////list product
//Route::prefix('product')->group(function () {
//    Route::get('/index', 'ProductController@getAll')->name('list-product');
//    Route::get('/create', 'ProductController@CreateProduct')
//        ->name('add-product');
//    Route::post('/save-create', 'ProductController@SaveCreate')
//        ->name('save-product');
//    Route::get('/update/{id}', 'ProductController@UpdateProduct');
//    Route::post('/save-update', 'ProductController@SaveUpdate')
//        ->name('update-product');
//    Route::get('/delete/{id}', 'ProductController@DeleteProduct');
//});
//
////list user
//Route::prefix('user')->group(function () {
//    Route::get('index', 'UserManagerController@getAll')->name('list-user');
//    Route::get('create', 'UserManagerController@CreateUser')
//        ->name('create-user');
//    Route::post('save-create', 'UserManagerController@SaveCreate')
//        ->name('save-user');
//    Route::get('update/{id}', 'UserManagerController@UpdateUser');
//    Route::post('save-update', 'UserManagerController@SaveUpdate')
//        ->name('save-update-user');
//    Route::get('delete/{id}', 'UserManagerController@DeleteUser');
//});
//
////post category
//Route::prefix('post-category')->group(function () {
//    Route::get('/index', 'PostCategoryController@index')
//        ->name('list-post-category');
//    Route::get('/create', 'PostCategoryController@create')
//        ->name('create-post-category');
//    Route::post('save-creare', 'PostCategory@save_post_category')
//        ->name('save-post-category');
//});

Route::get('/', 'website\HomeController@index');
Route::get('/signin', 'website\SigninController@signin');
Route::get('/signup', 'website\SigninController@signup');
Route::get('/pricing', 'website\PricingController@pricing');
// Route::get('/about', function () {
//     return view('website.about');
// });
// Route::get('/contract', function () {
//     return view('website.contract');
// });

