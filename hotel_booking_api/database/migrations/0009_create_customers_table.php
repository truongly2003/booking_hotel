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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->foreignId('user_id')->constrained('users','user_id')->onDelete('cascade');
            $table->string('customer_name', 100);
            $table->string('customer_phone', 15);
            $table->text('customer_address');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
