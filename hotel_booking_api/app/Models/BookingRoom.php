<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $table = 'booking_rooms';
    protected $fillable = [
        'booking_id',
        'room_id',
    ];
    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id');
    }
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
