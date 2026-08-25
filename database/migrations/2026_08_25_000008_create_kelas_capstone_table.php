<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas_capstone', function (Blueprint $table) {
            $table->string('id_kelas')->primary();
            $table->string('kode_mk');
            $table->string('nidn_koordinator');
            $table->string('tahun_akademik');
            $table->string('periode_semester');
            $table->integer('kuota_tim');
            $table->timestamps();

            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('mata_kuliah')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('nidn_koordinator')
                ->references('nidn')
                ->on('dosen')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_capstone');
    }
};
