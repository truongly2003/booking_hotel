<?php

namespace App\Repositories;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\IRoomRepository;

class RoomRepository extends BaseRepository implements IRoomRepository
{
    public function __construct(Room $room)
    {
        parent::__construct($room);
    }
    public function getHotelRoomsByHotelId($hotelId)
    {
        return Hotel::with([
            'rooms.roomType:room_type_id,room_type_name,base_price,room_size,max_capacity,bed_count,amenities',
            'rooms.room_images:image_url,room_id'
        ])->findOrFail($hotelId);
    }
    public function getAvailableRooms($hotelId, $checkInDate, $checkOutDate){
        
    }
    // public function getAvailableRooms($hotelId, $checkInDate, $checkOutDate)
    // {
    //     return RoomType::select('room_types.room_type_id', 'room_types.room_type_name', 'room_types.base_price', 'room_types.max_capacity', 'room_types.amenities')
    //         ->withCount(['rooms as so_luong' => function ($query) use ($hotelId) {
    //             $query->where('hotel_id', $hotelId);
    //         }])
    //         ->whereHas('rooms', function ($query) use ($hotelId, $checkInDate, $checkOutDate) {
    //             $query->where('hotel_id', $hotelId)
    //                 ->whereDoesntHave('bookings', function ($query) use ($checkInDate, $checkOutDate) {
    //                     $query->where(function ($q) use ($checkInDate, $checkOutDate) {
    //                         $q->where('check_out_date', '>=', $checkInDate)
    //                           ->where('check_in_date', '<=', $checkOutDate);
    //                     });
    //                 });
    //         })
    //         ->get();
    // }
}
