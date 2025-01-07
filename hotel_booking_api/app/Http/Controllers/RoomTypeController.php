<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Interfaces\IRoomTypeService;

class RoomTypeController extends Controller
{
    protected $roomTypeService;
    public function __construct(IRoomTypeService $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }
    public function getAvailableRooms($hotelId, Request $request)
    {
        $checkInDate = $request->input('check_in_date', '2024-12-8');  
        $checkOutDate = $request->input('check_out_date', '2025-12-10');
        // $checkInDate = $request->get('check_in_date');
        // $checkOutDate = $request->get('check_out_date');
        $roomTypes = $this->roomTypeService->getAvailableRooms($hotelId, $checkInDate, $checkOutDate);
        return response()->json($roomTypes);
    }
}
