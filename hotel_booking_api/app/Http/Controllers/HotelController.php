<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Interfaces\IHotelService;

class HotelController extends Controller
{
    protected $hoteService;
    public function __construct(IHotelService $hoteService) {
        $this->hoteService = $hoteService;
    }
    public function show(){
        $hotels=$this->hoteService->getAllHotels();
        return response()->json($hotels);
    }
}
