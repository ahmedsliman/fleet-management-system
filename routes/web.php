<?php

use App\City;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(City::select('id', 'name')->get()->toArray());
});

// Route::get('/book', 'HomeController@checkMySeat');
// Route::post('/book', 'HomeController@bookMySeat');

// Auth::routes();