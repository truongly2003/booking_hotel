<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;

// location
Route::get('/locations', [LocationController::class,'show']);

// hotels
Route::get('/hotels',[HotelController::class,'show']);

// rooms
// Route::get('/rooms/{hotelId}', [RoomController::class, 'show']);
Route::get('/hotel/{hotelId}/rooms', [RoomTypeController::class, 'getAvailableRooms']);
// Route::get('/hotel/rooms', [RoomTypeController::class, 'getAvailableRooms']);

Route::get('/hotel/room', action: [RoomController::class, 'showw']);

Route::get('/image/{roomId}',[RoomController::class, 'image']);


// room type
Route::get('/roomtype',[RoomTypeController::class, 'show']);
