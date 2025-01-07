<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        RoomImage::factory()->count(1000)->create();
    }
}
