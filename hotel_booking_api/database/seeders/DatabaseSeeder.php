<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            HotelSeeder::class, 
            RoomTypeSeeder::class,
            RoomSeeder::class,
            RoomImageSeeder::class,
            HotelImageSeeder::class,
        ]);
    }
}
