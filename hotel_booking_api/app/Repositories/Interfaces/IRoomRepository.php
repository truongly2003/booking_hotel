<?php
namespace App\Repositories\Interfaces;
use App\Repositories\Interfaces\IBaseRepository;

interface IRoomRepository extends IBaseRepository{
    public function getHotelRoomsByHotelId($hotelId);
    public function getAvailableRooms($hotelId,$checkInDate,$checkOutDate);
}