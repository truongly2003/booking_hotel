<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Hotel::class;
    public function definition(): array
    {
        $hotelNames = [
            'Sofitel Metropole Hanoi',
            'Park Hyatt Saigon',
            'The Reverie Saigon',
            'InterContinental Hanoi Westlake',
            'JW Marriott Hotel Hanoi',
            'Novotel Danang Premier Han River',
            'Sheraton Hanoi Hotel',
            'Lotte Hotel Hanoi',
            'Grand Mercure Hanoi',
            'Fusion Suites Danang Beach',
            'Melia Hanoi Hotel',
            'Sherwood Residence Ho Chi Minh City',
            'Meliá Ba Vi Mountain Retreat',
            'Alma Resort Cam Ranh',
            // Add more hotel names as needed
        ];
        return [
            'hotel_name'=>$this->faker->company . 'Hotel',
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'description' => $this->faker->sentence(10),
            'location_id' =>Location::all()->random()->location_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
