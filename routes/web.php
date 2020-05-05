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
Route::get('/pages', 'PagesController@home');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/flyers', 'FlyersController@getall');
Route::get('/pages/index', 'FlyersController@index');

Route::get('/flyers/create', 'FlyersController@create')->middleware('auth');
Route::post('/flyers', 'FlyersController@store')->middleware('auth');
Route::get('{zip}/{street}', 'FlyersController@show');
//Route::get('/flyers/show', 'FlyersController@show');
Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto')->middleware('auth')->name('store_photo_path');
    
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
