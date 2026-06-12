<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->string('room_name')->nullable();

            $table->date('check_in')->nullable();

            $table->date('check_out')->nullable();

            $table->bigInteger('total_price')->nullable();

            $table->string('payment_method')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

    $table->string('room_name')->nullable();

    $table->date('check_in')->nullable();

    $table->date('check_out')->nullable();

    $table->bigInteger('total_price')->nullable();

    $table->string('payment_method')->nullable();

    $table->string('payment_proof')->nullable(); // TAMBAHAN
});
    }
};