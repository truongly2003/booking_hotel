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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('room_number', 50);
            $table->enum('status', ['Available', 'Booked', 'Under Maintenance']);
            $table->text('description')->nullable(); 
            $table->integer('floor'); 
          
            $table->decimal('price', 10, 2);
            $table->foreignId('hotel_id')->constrained('hotels','hotel_id')->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained('room_types','room_type_id')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
