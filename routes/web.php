<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware' => 'guest','prefix' => 'admin'], function () {
        Route::get('/', 'Auth\LoginController@pageLogin')->name('admin.login');
        Route::post('/', 'Auth\LoginController@postLogin');
        Route::get('/auth/redirect/{provider}', 'Auth\SocialController@redirect')->name('admin.redirect');
        Route::get('/callback/{provider}', 'Auth\SocialController@callback');
        Route::get('/register','Auth\RegisterController@pageRegister')->name('admin.register');
        Route::post('/register', 'Auth\RegisterController@postRegister');
});

Route::group(['middleware' => 'auth','prefix' => 'dashboard'], function () {
    Route::get('/', 'Auth\LoginController@pageDashboard')->name('admin.dashboard');
    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');

    //TODO Category
    Route::group(['prefix' => 'category'], function (){
        Route::get('/', 'Category\CategoryController@pageCategory')->name('admin.category');
        Route::post('/', 'Category\CategoryController@create');
        Route::get('/destroy/{id}', 'Category\CategoryController@destroy')->name('admin.category.destroy');
        Route::get('/update/{id}', 'Category\CategoryController@pageUpdateCategory')->name('admin.category.update');
        Route::post('/update/{id}', 'Category\CategoryController@update');
        Route::get('/statusFuture/{id}', 'Category\CategoryController@statusFuture')->name('admin.category.update.future');
        Route::get('/statusNotFuture/{id}', 'Category\CategoryController@statusNotFuture')->name('admin.category.update.notfuture');
    });

    //TODO Account
    Route::post('/', 'Account\AccountController@update');
});


