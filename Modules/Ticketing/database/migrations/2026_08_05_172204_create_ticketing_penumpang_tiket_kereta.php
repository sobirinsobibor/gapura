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
        Schema::create('ticketing_penumpang_tiket_kereta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tckt_penumpang_id')
                ->constrained('ticketing_penumpang')
                ->name('fk_tckt_penumpang');
            $table->foreignId('tckt_tiket_kereta_id')
                ->constrained('ticketing_tiket_kereta')
                ->name('fk_tckt_tiket_kereta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_penumpang_tiket_kereta');
    }
};
