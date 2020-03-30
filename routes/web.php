<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/book', 'HomeController@checkMySeat');
Route::post('/book', 'HomeController@bookMySeat');

Auth::routes();