<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_studi', function (Blueprint $table) {
            $table->string('id_prodi')->primary();
            $table->string('kode_prodi')->unique();
            $table->string('nama_prodi');
            $table->string('akreditasi_nasional')->nullable();
            $table->string('akreditasi_internasional')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
