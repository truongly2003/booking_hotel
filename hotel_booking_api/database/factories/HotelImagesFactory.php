<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\HotelImages;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelImages>
 */
class HotelImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = HotelImages::class;
    public function definition(): array
    {
        $roomNumber = $this->faker->numberBetween(1, 10);
        return [
            'image_url' => "room_{$roomNumber}.jpg",
            'hotel_id' => Hotel::all()->random()->hotel_id,
        ];
    }
}
