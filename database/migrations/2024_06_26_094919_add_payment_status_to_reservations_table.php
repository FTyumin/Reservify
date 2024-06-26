<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->string('payment_status')->nullable();
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropColumn('payment_status');
    });
}
};
