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
        Schema::table('ticketing_pemesanan', function (Blueprint $table) {
            $table->foreignId('created_by')
                ->nullable()
                ->after('harga_jual')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticketing_pemesanan', function (Blueprint $table) {
            $table->dropConstrainedForeignId('created_by');
        });
    }
};