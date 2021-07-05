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
//    Route::get('/home', 'Admin\HomeController@layout')->name('home');
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
    //movie
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
        Route::get('delete/{id}', 'Admin\RoomController@delete')->name('room.delete');
    });
    //user
    Route::group(['prefix' => 'usermanager'], function () {
        Route::get('/', 'Admin\UserManagerController@index')->name('usermanager.index');
        Route::get('create', 'Admin\UserManagerController@create')->name('usermanager.create');
        Route::post('save-create', 'Admin\UserManagerController@store')->name('usermanager.store');
        Route::get('update/{id}', 'Admin\UserManagerController@edit')->name('usermanager.edit');
        Route::post('save-update', 'Admin\UserManagerController@update')->name('usermanager.update');
        Route::get('delete/{id}', 'Admin\UserManagerController@delete')->name('usermanager.delete');
    });
    //showtime
    Route::group(['prefix' => 'show-time'], function () {
        Route::get('/', 'Admin\ShowTimeController@index')->name('show_time.index');
        Route::get('create', 'Admin\ShowTimeController@create')->name('show_time.create');
        Route::post('save-create', 'Admin\ShowTimeController@store')->name('show_time.store');
        Route::get('update/{id}', 'Admin\ShowTimeController@edit')->name('show_time.edit');
        Route::post('save-update', 'Admin\ShowTimeController@update')->name('show_time.update');
        Route::get('delete/{id}', 'Admin\ShowTimeController@Delete')->name('show_time.delete');
    });
    //room seats
    Route::group(['prefix' => 'room-seat'], function () {
        Route::get('/', 'Admin\RoomSeatController@index')->name('room_seat.index');
        Route::post('/disable', 'Admin\RoomSeatController@disable')->name('room_seat.disable');
        Route::post('/enable', 'Admin\RoomSeatController@enable')->name('room_seat.enable');
        Route::get('/{id_room}', 'Admin\RoomSeatController@change_room')->name('room_seat.change_room');
    });
    //price ticket
    Route::group(['prefix' => 'price-ticket'], function () {
        Route::get('/', 'Admin\PriceTicketController@index')->name('price_ticket.index');
        Route::get('create', 'Admin\PriceTicketController@create')->name('price_ticket.create');
        Route::post('save-create', 'Admin\PriceTicketController@store')->name('price_ticket.store');
        Route::get('update/{id}', 'Admin\PriceTicketController@edit')->name('price_ticket.edit');
        Route::post('save-update', 'Admin\PriceTicketController@update')->name('price_ticket.update');
        Route::get('delete/{id}', 'Admin\PriceTicketController@Delete')->name('price_ticket.delete');;
    });
});

Auth::routes();

Route::get('/', 'website\HomeController@index');
Route::get('/signin', 'website\SigninController@signin')->name('signin');
Route::get('/signup', 'website\SigninController@signup')->name('signup');
Route::get('/logout', 'website\SigninController@logout')->name('logout');
Route::get('/pricing', 'website\PricingController@pricing');
Route::get('/movie/{id}.html', 'website\MovieController@detail')->name('movie.details');
Route::get('/movie/add-favourite/{movie_id}', 'website\MovieController@add_favourite')->name('movie.add_favourite');
Route::post('login-customer', 'website\SigninController@login_customer')->name('login_customer');
