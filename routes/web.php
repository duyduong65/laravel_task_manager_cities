<?php

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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/cities')->group(function (){
    Route::get('index','CitiesController@index')->name('cities.index');
    Route::get('destroy/{id}','CitiesController@destroy')->name('cities.destroy');
    Route::get('create','CitiesController@create')->name('cities.create');
    Route::post('create','CitiesController@store')->name('cities.create');
    Route::get('edit/{id}','CitiesController@edit')->name('cities.edit');
    Route::post('edit/{id}','CitiesController@update')->name('cities.update');
    Route::prefix('/list-customer')->group(function (){
        Route::get('show-list/{id}','CitiesController@show')->name('cities.showListCustomer');
    });
});

Route::prefix('/customers')->group(function (){
    Route::get('index','CustomersController@index')->name('customers.index');
    Route::get('create','CustomersController@create')->name('customers.create');
    Route::post('create','CustomersController@store')->name('customers.create');
    Route::get('delete/{id}','CustomersController@destroy')->name('customers.destroy');
    Route::get('edit/{id}','CustomersController@edit')->name('customers.edit');
    Route::post('update/{id}','CustomersController@update')->name('customers.update');
});


