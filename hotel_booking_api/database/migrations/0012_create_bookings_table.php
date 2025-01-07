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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->foreignId('user_id')->constrained('users','user_id')->onDelete('cascade');
            $table->foreignId('hotel_id')->constrained('hotels','hotel_id')->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['Confirmed', 'Pending', 'Cancelled']);
            $table->timestamp('booking_date')->useCurrent();
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
