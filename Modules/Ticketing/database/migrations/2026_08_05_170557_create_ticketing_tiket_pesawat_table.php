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
        Schema::create('ticketing_tiket_pesawat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tckt_maskapai_id')
                ->constrained('ticketing_maskapai')
                ->name('fk_tckt_maskapai');
            $table->foreignId('tckt_vendor_id')
                ->constrained('ticketing_vendor')
                ->name('fk_tckt_vendor');
            $table->foreignId('tckt_pemesanan_id')
                ->constrained('ticketing_pemesanan')
                ->name('fk_tckt_pemesanan');
            $table->foreignId('tckt_bandara_berangkat_id')
                ->constrained('ticketing_bandara')
                ->name('fk_tckt_bandara');
            $table->foreignId('tckt_bandara_tiba_id')
                ->constrained('ticketing_bandara')
                ->name('fk_tckt_bandara');
            $table->string('nomor_ticket');
            $table->string('nomor_penerbangan');
            $table->string('kode_booking_pesawat');
            // $table->string('jenis_tiket_pesawat');
            $table->string('kelas');
            $table->dateTime('jadwal_berangkat_pesawat');
            $table->dateTime('jadwal_tiba_pesawat');
            $table->text('detail_pulang_pergi')->nullable();
            $table->string('zona_waktu')->nullable();
            $table->string('zona_waktu_kedatangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_tiket_pesawat');
    }
};
