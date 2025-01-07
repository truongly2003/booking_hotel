<?php

namespace App\Repositories;

use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\IRoomTypeRepository;

class RoomTypeRepository extends BaseRepository implements IRoomTypeRepository
{

    public function __construct(RoomType $roomType)
    {
        parent::__construct($roomType);
    }
    // cách 1
    public function getAvailableRoomTypes($hotelId, $checkInDate, $checkOutDate)
    {
        $roomTypes = RoomType::with(['rooms' => function ($query) use ($hotelId, $checkInDate, $checkOutDate) {
            $query->where('rooms.hotel_id', $hotelId)
                ->where(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->whereDoesntHave('bookings', function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                            $query->where('bookings.check_out_date', '>=', $checkInDate)
                                ->where('bookings.check_in_date', '<=', $checkOutDate);
                        });
                    });
                })->with('room_images');
        }])->get();
        $roomTypes->each(function ($roomType) {
            $roomType->stock = $roomType->rooms->count();
        });
        return $roomTypes->filter(function ($roomType) {
            return $roomType->stock>0;
        }) 
         ->map(function ($roomType) {
            return [
                'room_type_id' => $roomType->room_type_id,
                'room_type_name' => $roomType->room_type_name,
                'base_price' => $roomType->base_price,
                'room_size' => $roomType->room_size,
                'max_capacity' => $roomType->max_capacity,
                'bed_count' => $roomType->bed_count,
                'amenities' => $roomType->amenities,
                'stock' => $roomType->stock,
               'images' => $roomType->rooms->flatMap(function ($room) {
                return $room->room_images->pluck('image_url'); 
            })->unique()->values(),
            ];
        })->values();
    }

    // cách 2
    public function getAvailableRooms($hotelId, $checkInDate, $checkOutDate)
    {
        $query = RoomType::select(
            'room_types.room_type_id',
            'room_types.room_type_name',
            'room_types.base_price',
            'room_types.room_size',
            'room_types.bed_count',
            'room_types.max_capacity',
            'room_types.amenities',
            DB::raw('COUNT(DISTINCT rooms.room_id) AS so_luong')
        )
            ->join('rooms', 'room_types.room_type_id', '=', 'rooms.room_type_id')
            ->leftJoin('booking_rooms', 'rooms.room_id', '=', 'booking_rooms.room_id')
            ->leftJoin('bookings', 'booking_rooms.booking_id', '=', 'bookings.booking_id')
            ->where('rooms.hotel_id', $hotelId)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereNull('bookings.booking_id')
                    ->orWhere('bookings.check_out_date', '<', $checkInDate)
                    ->orWhere('bookings.check_in_date', '>', $checkOutDate);
            })
            ->groupBy(
                'room_types.room_type_id',
                'room_types.room_type_name',
                'room_types.base_price',
                'room_types.room_size',
                'room_types.bed_count',
                'room_types.max_capacity',
                'room_types.amenities'
            );
        return $query->get();
    }
}
