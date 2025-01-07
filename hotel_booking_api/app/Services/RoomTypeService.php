<?php
namespace App\Services;
use App\Services\Interfaces\IRoomTypeService;
use App\Repositories\Interfaces\IRoomTypeRepository;

class RoomTypeService implements IRoomTypeService{
    protected $roomTypeRepository;
    public function __construct(IRoomTypeRepository $roomTypeRepository){
        $this->roomTypeRepository = $roomTypeRepository;
    }
    public function getAvailableRooms($hotelId, $checkInDate, $checkOutDate) {
        // return $this->roomTypeRepository->getAvailableRooms($hotelId, $checkInDate, $checkOutDate);
        return $this->roomTypeRepository->getAvailableRoomTypes($hotelId, $checkInDate, $checkOutDate);
    }
}
