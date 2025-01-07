<?php
namespace App\Services;
use App\Services\Interfaces\IHotelService;
use App\Repositories\Interfaces\IHotelRepository;

class HotelService implements IHotelService
{
    protected $hotelRepository;
    public function __construct(IHotelRepository $hotelRepository){
        $this->hotelRepository = $hotelRepository;
    }
    public function getAllHotels(){
        return $this->hotelRepository->getAll();
    }
}
