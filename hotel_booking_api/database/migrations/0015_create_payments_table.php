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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('booking_id')->constrained('bookings','booking_id')->onDelete('cascade');
            $table->enum('payment_method', ['Credit Card', 'Debit Card', 'Cash', 'Online Payment']);
            $table->enum('payment_status', ['Paid', 'Pending', 'Failed']);
            $table->timestamp('payment_date')->useCurrent();
            $table->decimal('amount', 10, 2);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
