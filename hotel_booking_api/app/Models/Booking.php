<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='bookings';
    protected $primaryKey = 'booking_id'; 
    protected $fillable = [
        'user_id',
        'hotel_id',
        'check_in_date',
        'check_out_date',
        'total_amount',
        'status',
        'booking_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
    public function rooms(){
        return $this->belongsToMany(Room::class, 'booking_rooms','booking_id','room_id');
    }

}
