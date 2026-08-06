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
        Schema::create('ticketing_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->string('nama_customer');
            $table->foreignId('tckt_kategori_pemesanan_id')
                ->constrained('ticketing_kategori_pemesanan')
                ->name('fk_tckt_kategori_pemesanan');
            $table->foreignId('tckt_unit_kerja_id')
                ->constrained('ticketing_unit_kerja')
                ->name('fk_tckt_unit_kerja');
            $table->string('status_pemesanan');
            // $table->boolean('lunas')->default(false);
            $table->integer('pulang_pergi');
            // $table->boolean('transit');
            $table->date('tanggal_pemesanan');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_publish');
            $table->bigInteger('harga_jual');
            // $table->date('jatuh_tempo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_pemesanan');
    }
};
