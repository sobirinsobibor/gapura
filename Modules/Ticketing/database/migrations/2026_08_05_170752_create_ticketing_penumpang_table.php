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
        Schema::create('ticketing_penumpang', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('unit_kerja_id');
            // $table->string('NIK')->unique();
            $table->string('nama_penumpang');
            // $table->string('alamat_penumpang');
            // $table->string('telp_penumpang');
            // $table->string('email_penumpang');
            $table->boolean('jenis_kelamin');
            // 0 laki laki , 1 perempuan
            // $table->boolean('jenis_usia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticketing_penumpang');
    }
};
