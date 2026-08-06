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
        Schema::create('ticketing_penumpang_tiket_pesawat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tckt_penumpang_id')
                ->constrained('ticketing_penumpang')
                ->name('fk_tckt_penumpang');
            $table->foreignId('tckt_tiket_pesawat_id')
                ->constrained('ticketing_tiket_pesawat')
                ->name('fk_tckt_tiket_pesawat');
            $table->unique(
                ['tckt_penumpang_id', 'tckt_tiket_pesawat_id'],
                'uq_penumpang_tiket'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_penumpang_tiket_pesawat');
    }
};
