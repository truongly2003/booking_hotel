<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table="hotels";
    protected $primaryKey = 'hotel_id';
    protected $fillable=[
        'hotel_name','address','phone_number','email','description','location_id'
    ];
    public function rooms(){
        return $this->hasMany(Room::class,'hotel_id');
    }
    public function bookings(){
        return $this->hasMany(Booking::class, 'booking_id');
    }
}
