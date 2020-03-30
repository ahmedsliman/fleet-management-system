<?php

use App\City;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(City::select('id', 'name')->get()->toArray());
});
