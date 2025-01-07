<?php
namespace App\Repositories;
use App\Models\Hotel;
use App\Repositories\Interfaces\IHotelRepository;
use App\Repositories\BaseRepository;

class HotelRepository extends BaseRepository implements IHotelRepository
{
    public function __construct(Hotel $hotel)
    {
        parent::__construct($hotel);
    }
    public function findByName($name) {}
    
}

