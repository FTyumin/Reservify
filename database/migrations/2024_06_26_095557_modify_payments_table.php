<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Remove existing columns
            $table->dropColumn('payment_method');
            $table->dropColumn('status');

            // Add new columns for credit card and email
            $table->string('credit_card_number');
            $table->string('expiry_date');
            $table->string('cvv');
            $table->string('email');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Reverse changes if rollback needed
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            
            // Remove added columns
            $table->dropColumn('credit_card_number');
            $table->dropColumn('expiry_date');
            $table->dropColumn('cvv');
            $table->dropColumn('email');
        });
    }
}
