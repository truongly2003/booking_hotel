<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/locations', function(){
//     return 'hello world';
// });

// // locations
// Route::get('/locations', [LocationController::class,'show']);

// // hotels
// Route::get('/hotels',[HotelController::class,'show']);

