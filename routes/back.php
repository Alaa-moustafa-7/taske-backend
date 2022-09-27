<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

// Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth:admins'], function () {
//     Route::get('/', 'LoginController@register')->name('taske.register');
//     Route::post('create', 'LoginController@signup')->name('taske.signup');
//     //Route::get('login', 'LoginController@login')->name('taske.login');

// });

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'guest:admins'], function () {
    Route::get('/', 'LoginController@register')->name('taske.register');
    Route::post('create', 'LoginController@signup')->name('taske.signup');
    Route::get('login', 'LoginController@login')->name('taske.login');
    Route::post('check', 'LoginController@checked')->name('taske.check');
    Route::get('dash', 'LoginController@show')->name('taske.dash');
    Route::get('edit/{id}', 'LoginController@edit')->name('taske.edit');
    Route::post('update/{id}', 'LoginController@update')->name('taske.update');
    Route::get('delete/{id}', 'LoginController@destroy')->name('taske.delete');
});

// Route::get('added', '\App\Http\Controllers\Back\LoginController@login');
