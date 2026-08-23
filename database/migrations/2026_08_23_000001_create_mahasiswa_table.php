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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary(); // PK
            $table->string('id_prodi');       // FK (referensi ke tabel prodi jika ada)
            $table->string('nama_mahasiswa');
            $table->integer('angkatan');
            $table->decimal('ipk', 3, 2)->nullable();
            $table->string('status_akademik'); // aktif, cuti, lulus, dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
