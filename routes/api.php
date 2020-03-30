<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/token', 'HomeController@getToken');
Route::get('/book', 'HomeController@checkMySeat')->middleware('auth:sanctum');
Route::post('/book', 'HomeController@bookMySeat')->middleware('auth:sanctum');