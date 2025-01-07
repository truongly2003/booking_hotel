<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = "room_types";
    protected $primaryKey = 'room_type_id';
    protected $fillable = [
        'room_type_name',
        'base_price',
        'room_size',
        'max_capacity',
        'bed_count',
        'amenities'
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
