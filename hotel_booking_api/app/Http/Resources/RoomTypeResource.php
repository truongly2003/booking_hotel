<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'room_type_name' => $this->room_type_name,
            'room_type_id' => $this->room_type_id,
            'count_room'=>$this->count_room
        ];
    }
}
