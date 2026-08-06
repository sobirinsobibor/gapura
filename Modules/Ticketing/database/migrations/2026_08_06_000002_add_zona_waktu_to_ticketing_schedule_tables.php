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
        Schema::table('ticketing_tiket_pesawat', function (Blueprint $table) {
            $table->string('zona_waktu')->nullable()->after('detail_pulang_pergi');
        });

        Schema::table('ticketing_tiket_kereta', function (Blueprint $table) {
            $table->string('zona_waktu')->nullable()->after('jadwal_tiba_kereta');
        });

        Schema::table('ticketing_kamar_hotel', function (Blueprint $table) {
            $table->string('zona_waktu')->nullable()->after('jadwal_checkout');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticketing_tiket_pesawat', function (Blueprint $table) {
            $table->dropColumn('zona_waktu');
        });

        Schema::table('ticketing_tiket_kereta', function (Blueprint $table) {
            $table->dropColumn('zona_waktu');
        });

        Schema::table('ticketing_kamar_hotel', function (Blueprint $table) {
            $table->dropColumn('zona_waktu');
        });
    }
};