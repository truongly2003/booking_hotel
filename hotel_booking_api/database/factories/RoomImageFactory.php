<?php

namespace Database\Factories;

use App\Models\RoomImage;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomImage>
 */
class RoomImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RoomImage::class;
    public function definition(): array
    {
        $roomNumber = $this->faker->numberBetween(1, 20);
        return [
            'image_url' => "room_{$roomNumber}.jpg",
            'room_id' => Room::all()->random()->room_id,
        ];
    }
}
