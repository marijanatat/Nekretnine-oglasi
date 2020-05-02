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

Route::get('/pages/index', function () {
    // Session::flash('success', 'Dobro dosli');
    //Session::flash('flash_message', 'You just made a cool edit to your profile.');
	//Session::flash('flash_type', 'alert-info');
return view('pages.index');
});

Route::get('/flyers/create', 'FlyersController@create');
Route::post('/flyers', 'FlyersController@store');
Route::get('/flyers/{zip}/{street}', 'FlyersController@show');
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
