<?php
namespace App\Repositories\Interfaces;
interface IHotelRepository extends IBaseRepository
{
    public function findByName($name);
}
