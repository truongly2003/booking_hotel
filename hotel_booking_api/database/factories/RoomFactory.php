<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Room::class;
    public function definition(): array
    {
        return [
            'room_number'=>$this->faker->unique()->numerify(('Room ###')),
            'status' => $this->faker->randomElement(['Available', 'Booked', 'Under Maintenance']),
            'description' => $this->faker->sentence(),
            'floor' => $this->faker->numberBetween(1, 10), 
           
            'price' => $this->faker->randomFloat(2, 50, 500), 
            'hotel_id'=>Hotel::all()->random()->hotel_id,
            'room_type_id'=>RoomType::all()->random()->room_type_id
        ];
    }
}
