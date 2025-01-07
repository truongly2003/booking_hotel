<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;
    protected $table = 'room_images';
    protected $primaryKey = 'image_id';
    protected $fillable = [
        'image_url', 
        'room_id'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
