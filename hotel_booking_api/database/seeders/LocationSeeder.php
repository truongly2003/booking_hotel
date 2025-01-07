<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Location::factory(10)->create();
        DB::table('locations')->insert(
            [
                [
                    'country' => 'Vietnam',
                    'city' => 'Hanoi',
                    'district' => 'Cau Giay',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Hanoi',
                    'district' => 'Hoan Kiem',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Hanoi',
                    'district' => 'Tay Ho',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Ho Chi Minh City',
                    'district' => 'District 1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Ho Chi Minh City',
                    'district' => 'District 3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Da Nang',
                    'district' => 'Hai Chau',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Da Nang',
                    'district' => 'Son Tra',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Hue',
                    'district' => 'Hue City',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Can Tho',
                    'district' => 'Ninh Kieu',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'country' => 'Vietnam',
                    'city' => 'Hai Phong',
                    'district' => 'Le Chan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
