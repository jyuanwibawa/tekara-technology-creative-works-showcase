<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_koordinator', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->index();
            $table->string('nidn_sebelum')->nullable();
            $table->string('nama_sebelum')->nullable();
            $table->string('nidn_sesudah');
            $table->string('nama_sesudah');
            $table->string('nomor_sk');
            $table->date('tanggal_sk');
            $table->text('alasan')->nullable();
            $table->string('ditetapkan_oleh');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_koordinator');
    }
};
