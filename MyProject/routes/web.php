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
    Route::get('change-language/{language}', 'Admin\HomeController@ChangLanguage')
        ->name('user.change-language');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/home', 'Admin\HomeController@layout')->name('home');
    Route::get('/logout', 'Admin\HomeController@Logout');
    //introduce
    Route::group(['prefix' => 'introduce'], function () {
        Route::get('/', 'Admin\IntroduceController@index')->name('introduce.index');
        Route::get('edit/{id}', 'Admin\IntroduceController@edit')->name('introduce.edit');
        Route::post('update', 'Admin\IntroduceController@update')->name('introduce.update');
    });
    //movie category
    Route::group(['prefix' => 'movie-category'], function () {
        Route::get('/', 'Admin\MovieCategoryController@index')->name('moviecategory.index');
        Route::get('create', 'Admin\MovieCategoryController@create')->name('moviecategory.create');
        Route::post('save-create', 'Admin\MovieCategoryController@store')->name('moviecategory.store');
        Route::get('update/{id}', 'Admin\MovieCategoryController@edit')->name('moviecategory.edit');
        Route::post('save-update', 'Admin\MovieCategoryController@update')->name('moviecategory.update');
        Route::get('delete/{id}', 'Admin\MovieCategoryController@DeleteMovieCategory')->name('moviecategory.delete');
    });
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/', 'Admin\MovieController@index')->name('movie.index');
        Route::get('create', 'Admin\MovieController@create')->name('movie.create');
        Route::post('store', 'Admin\MovieController@store')->name('movie.store');
        Route::get('edit/{id}', 'Admin\MovieController@edit')->name('movie.edit');
        Route::post('update', 'Admin\MovieController@update')->name('movie.update');
        Route::get('delete/{id}', 'Admin\MovieController@delete')->name('movie.delete');
    });
    //room
    Route::group(['prefix' => 'room'], function () {
        Route::get('/', 'Admin\RoomController@index')->name('room.index');
        Route::get('create', 'Admin\RoomController@create')->name('room.create');
        Route::post('save-create', 'Admin\RoomController@store')->name('room.store');
        Route::get('update/{id}', 'Admin\RoomController@edit')->name('room.edit');
        Route::post('save-update', 'Admin\RoomController@update')->name('room.update');
        Route::get('delete/{id}', 'Admin\RoomController@Delete')->name('room.delete');
    });
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

