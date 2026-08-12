<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('judan_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('kode_institusi', 20)->nullable()->unique();
            $table->string('nama_institusi')->unique();
            $table->string('slug')->unique();
            $table->string('kontak')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('judan_institutions');
    }
};
