<?php
namespace App\Repositories\Interfaces;
use App\Repositories\Interfaces\IBaseRepository;
interface IRoomTypeRepository extends IBaseRepository{
    public function getAvailableRooms($hotelId,$checkInDate,$checkOutDate);
    public function getAvailableRoomTypes($hotelId,$checkInDate,$checkOutDate);
}
