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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('hotel_id');
            $table->string('hotel_name', 255);
            $table->string('address', 255);
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('location_id')->constrained('locations', 'location_id')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
