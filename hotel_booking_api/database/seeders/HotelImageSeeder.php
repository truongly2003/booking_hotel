<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
       HotelImages::factory()->count(100)->create();
    }
}
