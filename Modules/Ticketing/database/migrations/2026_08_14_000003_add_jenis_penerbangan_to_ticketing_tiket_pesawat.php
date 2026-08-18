<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ticketing_tiket_pesawat', function (Blueprint $table) {
            $table->string('jenis_penerbangan')->nullable()->after('kelas');
        });
    }

    public function down(): void
    {
        Schema::table('ticketing_tiket_pesawat', function (Blueprint $table) {
            $table->dropColumn('jenis_penerbangan');
        });
    }
};
