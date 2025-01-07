<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::table('room_types')->insert([
            [
                'room_type_name' => 'Standard Room',
                'base_price' => 500000, 
                'room_size'=>20,
                'max_capacity' => 2,   
                'bed_count' => 1,       
                'amenities' => 'Wi-Fi, TV, Mini Fridge, Air Conditioner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_type_name' => 'Deluxe Room',
                'base_price' => 900000, 
                'room_size'=>50,
                'max_capacity' => 3,   
                'bed_count' => 2,       
                'amenities' => 'Wi-Fi, TV, Mini Fridge, Air Conditioner, Bathtub, Coffee Maker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_type_name' => 'Suite',
                'base_price' => 1500000, 
                'room_size'=>80,
                'max_capacity' => 4,    
                'bed_count' => 2,        
                'amenities' => 'Wi-Fi, TV, Mini Fridge, Air Conditioner, Bathtub, Coffee Maker, Living Area',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_type_name' => 'Family Room',
                'base_price' => 1200000,
                'room_size'=>70,
                'max_capacity' => 5,     
                'bed_count' => 2,       
                'amenities' => 'Wi-Fi, TV, Mini Fridge, Air Conditioner, Bathtub, Sofa Bed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_type_name' => 'Presidential Suite',
                'base_price' => 5000000,
                'room_size'=>90,
                'max_capacity' => 6,     
                'bed_count' => 3,       
                'amenities' => 'Wi-Fi, TV, Mini Fridge, Air Conditioner, Bathtub, Coffee Maker, Jacuzzi, Private Pool',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
