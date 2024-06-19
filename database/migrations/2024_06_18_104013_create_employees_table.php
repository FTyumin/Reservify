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
        if(!Schema::hasTable('employees')){
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('position');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps(); 

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }
}

    /**
     * "Reverse the migrations."
     */

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
