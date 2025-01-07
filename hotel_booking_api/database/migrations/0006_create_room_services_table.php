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
        Schema::create('room_services', function (Blueprint $table) {
            $table->foreignId('room_id')->constrained('rooms','room_id')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services','service_id')->onDelete('cascade');
            $table->primary(['room_id', 'service_id']);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_services');
    }
};
