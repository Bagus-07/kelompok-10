<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kamars', function (Blueprint $table) {

            $table->foreignId('tipe_kamar_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('tipe_kamars')
                  ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {

            $table->dropForeign(['tipe_kamar_id']);
            $table->dropColumn('tipe_kamar_id');

        });
    }
};