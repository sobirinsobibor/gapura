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
        Schema::create('ticketing_dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tckt_vendor_id')
                ->constrained('ticketing_vendor')
                ->name('fk_tckt_vendor');
            $table->foreignId('tckt_pemesanan_id')
                ->constrained('ticketing_pemesanan')
                ->name('fk_tckt_pemesanan');
            $table->string('jenis_dokumen');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_dokumen');
    }
};
