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
        Schema::create('reviews', function (Blueprint $table) {

            $table->id('review_id');
            $table->foreignId('booking_id')->constrained('bookings','booking_id')->onDelete('cascade');
            $table->foreignId('hotel_id')->constrained('hotels','hotel_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users','user_id')->onDelete('cascade');
            $table->integer('rating')->check('rating >= 1 AND rating <= 5');
            $table->text('comment')->nullable();
            $table->timestamp('date_comment')->useCurrent();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
