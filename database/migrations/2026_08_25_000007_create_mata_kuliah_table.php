<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_mk')->primary();
            $table->string('id_prodi');
            $table->string('nama_mk');
            $table->integer('sks');
            $table->integer('semester');
            $table->text('deskripsi_mk')->nullable();
            $table->string('referensi_panduan')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')
                ->references('id_prodi')
                ->on('program_studi')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
