<?php
namespace App\Services;
use App\Services\Interfaces\IRoomService;
use App\Repositories\Interfaces\IRoomRepository;

class RoomService implements IRoomService{
    protected $roomRepository;
    public function __construct(IRoomRepository $roomRepository){
        $this->roomRepository = $roomRepository;
    }
    public function getHotelRoomsByHotelId($hotelId){
        $hotels=$this->roomRepository->getHotelRoomsByHotelId($hotelId);
        return $this->transformRooms($hotels->rooms);
    }
    private function transformRooms($rooms)
    {
        return $rooms->groupBy('room_type_id')->map(function ($rooms, $roomTypeId) {
            $roomType = $rooms->first()->roomType;
            $roomImages = $rooms->flatMap(fn($room) => $room->room_images->pluck('image_url'));
            return [
                'room_type_name' => $roomType->room_type_name,
                'room_type_id' => $roomTypeId,
                'count_room' => $rooms->count(),
                'images' => $roomImages, 
                'base_price' => $roomType->base_price,
                'room_size' => $roomType->room_size,
                'max_capacity' => $roomType->max_capacity,
                'bed_count' => $roomType->bed_count,
                'amenities' => $roomType->amenities,
            ];
        })->values()->toArray();
    }


    public function getAvailableRoomTypes(int $hotelId, string $checkInDate, string $checkOutDate)
    {
        $roomTypes = $this->repository->getRoomTypesWithRooms($hotelId, $checkInDate, $checkOutDate);

        // Duyệt qua các loại phòng và đếm số lượng phòng còn trống
        return $roomTypes->map(function ($roomType) use ($checkInDate, $checkOutDate) {
            $availableRoomsCount = $roomType->rooms->filter(function ($room) use ($checkInDate, $checkOutDate) {
                // Kiểm tra phòng có trùng booking hay không
                return $room->bookings->every(function ($booking) use ($checkInDate, $checkOutDate) {
                    return $booking->check_in_date > $checkOutDate || $booking->check_out_date < $checkInDate;
                });
            })->count();

            return [
                'room_type_id' => $roomType->id,
                'room_type_name' => $roomType->name,
                'base_price' => $roomType->base_price,
                'max_capacity' => $roomType->max_capacity,
                'amenities' => $roomType->amenities,
                'so_luong' => $availableRoomsCount
            ];
        });
    }
}