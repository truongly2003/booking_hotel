<?php
namespace App\Services\Interfaces;
interface IRoomTypeService{
    public function getAvailableRooms($hotelId,$checkInDate,$checkOutDate);
   
    
}