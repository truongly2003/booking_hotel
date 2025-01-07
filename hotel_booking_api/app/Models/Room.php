<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $primaryKey = 'room_id'; 
    protected $fillable = [
        'room_number',
        'status',
        'description',
        'floor',
        'price',
        'hotel_id',
        'room_type_id'
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function room_images()
    {
        return $this->hasMany(RoomImage::class, 'room_id');
    }

    public function bookings() {
        return $this->belongsToMany(Booking::class, 'booking_rooms', 'room_id', 'booking_id');
    }
}
