<?php
namespace App\Services\Interfaces;
interface IRoomService{
    public function getHotelRoomsByHotelId($hotelId);
}