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

Route::get('/', 'OrderController@list')->name('order.list');

Route::group(['prefix' => '/order'], function () {
    Route::get('/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('/save', 'OrderController@save')->name('order.save');
});

Route::group(['prefix' => '/product'], function () {
    Route::get('/', 'ProductController@list')->name('product.list');
    Route::get('/update-price/{id}/{price}', 'ProductController@updatePrice')->name('product.price.update');
});

Route::get('/weather', 'WeatherController@index')->name('weather');
