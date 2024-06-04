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
        Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('room_id');
                $table->unsignedBigInteger('guest_id');
                $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
                $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
                $table->dateTime('check_in');
                $table->dateTime('check_out');
                $table->boolean('is_active')->default(true);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
