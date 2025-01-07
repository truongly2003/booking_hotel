<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomImage;
use Illuminate\Routing\Controller;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\RoomTypeResource;
use App\Services\Interfaces\IRoomService;

class RoomController extends Controller
{

    public $roomService;
    public function __construct(IRoomService $roomService){
        $this->roomService = $roomService;
    }
    public function show($hotelId)
    {
        // $hotel = Hotel::with([
        //     'rooms.roomType:room_type_id,room_type_name,base_price,room_size,max_capacity,bed_count,amenities',
        //     'rooms.room_images:image_url,room_id'
        // ])
        // ->findOrFail($hotelId); 
        // $roomTypes = $hotel->rooms->groupBy('room_type_id')->map(function ($rooms, $roomTypeId) {
        //     $roomType = $rooms->first()->roomType;
        //     $roomImages = $rooms->flatMap(fn($room) => $room->room_images->pluck('image_url'));
        //     return [
        //         'room_type_name' => $roomType->room_type_name,
        //         'room_type_id' => $roomTypeId,
        //         'count_room' => $rooms->count(),
        //         'images' => $roomImages, 
        //         'base_price' => $roomType->base_price,
        //         'room_size' => $roomType->room_size,
        //         'max_capacity' => $roomType->max_capacity,
        //         'bed_count' => $roomType->bed_count,
        //         'amenities' => $roomType->amenities,
        //         'rooms' => $rooms->map(fn($room) => [
        //             'room_number' => $room->room_number,
        //             'status' => $room->status,
        //             'description' => $room->description,
        //             'floor' => $room->floor,
        //             'price' => $room->price
        //         ]) 
        //     ];
        // });
        // return response()->json($roomTypes);
        $roomTypes = $this->roomService->getHotelRoomsByHotelId($hotelId);
        return response()->json($roomTypes);
    }


    // public function index(Request $request)
    // {
    //     $hotelId = $request->input('hotel_id');
    //     $checkInDate = $request->input('check_in_date');
    //     $checkOutDate = $request->input('check_out_date');

    //     $roomTypes = $this->roomTypeService->getAvailableRooms($hotelId, $checkInDate, $checkOutDate);

    //     return response()->json($roomTypes);
    // }
}