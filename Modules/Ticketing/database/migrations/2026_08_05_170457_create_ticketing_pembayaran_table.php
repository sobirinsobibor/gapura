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
        Schema::create('ticketing_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tckt_unit_kerja_id')
                ->constrained('ticketing_unit_kerja')
                ->name('fk_tckt_unit_kerja');
            $table->foreignId('tckt_pemesanan_id')
                ->constrained('ticketing_pemesanan')
                ->name('fk_tckt_pemesanan');
            $table->string('nama_pembayar');
            // $table->integer('sisa_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_pembayaran');
    }
};
