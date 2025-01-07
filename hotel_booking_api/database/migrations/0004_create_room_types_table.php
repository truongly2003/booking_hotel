<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id('room_type_id');
            $table->string('room_type_name', 100)->nullable();
            $table->decimal('base_price', 10, 2);
            $table->float('room_size', 8); 
            $table->integer('max_capacity'); 
            $table->integer('bed_count');  
            $table->text('amenities')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
