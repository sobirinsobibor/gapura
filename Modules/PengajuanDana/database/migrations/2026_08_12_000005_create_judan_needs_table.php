<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('judan_needs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kebutuhan', 20)->nullable()->unique();
            $table->string('nama_kebutuhan')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('judan_needs');
    }
};
