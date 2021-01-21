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
    //File manager
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    //TODO Search
    Route::get('/searchpost','Search\SearchPostController@searchPost')->name('admin.searchPost');
    //TODO Dashbord
    Route::get('/', 'Auth\LoginController@pageDashboard')->name('admin.dashboard');
    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    //TODO Account
    Route::post('/', 'Account\AccountController@update');
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
    //TODO Post
    Route::group(['prefix' => 'post'], function(){
        Route::get('/','Post\PostController@pageCreatePost')->name('admin.post.create');
        Route::post('/','Post\PostController@create');
        Route::get('/allpost','Post\PostController@pageAllPost')->name('admin.post');
        Route::get('/allPost/{id}/future', 'Post\PostController@statusFuture')->name('admin.post.future');
        Route::get('/allPost/{id}/Notfuture', 'Post\PostController@statusNotFuture')->name('admin.post.notfuture');
        Route::get('/allPost/{id}/destroy', 'Post\PostController@destroy')->name('admin.post.destroy');
        Route::get('/update/{id}', 'Post\PostController@pageUpdatePost')->name('admin.post.update');
        Route::post('/update/{id}', 'Post\PostController@update')->name('admin.post.update');
    });
    //TODO slider
    Route::group(['prefix' => 'slider'], function(){
        Route::get('/','Slider\SliderController@pageAddSlider')->name('admin.slider.create');
        Route::post('/','Slider\SliderController@create');
        Route::get('/allslider','Slider\SliderController@pageAllSlider')->name('admin.slider');
        Route::get('/allsilder/{id}/future', 'Slider\SliderController@statusFuture')->name('admin.slider.future');
        Route::get('/allslider/{id}/Notfuture', 'Slider\SliderController@statusNotFuture')->name('admin.slider.notfuture');
        Route::get('/allslider/{id}/destroy', 'Slider\SliderController@destroy')->name('admin.slider.destroy');
        Route::get('/update/{id}', 'Slider\SliderController@pageUpdateSlider')->name('admin.slider.update');
        Route::post('/update/{id}', 'Slider\SliderController@update');
    });
});


