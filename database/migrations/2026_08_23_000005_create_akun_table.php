<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel AKUN menjadi tabel autentikasi utama. id_referensi merujuk ke
     * PK entitas terkait (nim / nidn / id_admin / id_mitra) sesuai role.
     */
    public function up(): void
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->string('id_akun')->primary();         // PK – UUID atau string
            $table->string('username')->unique();
            $table->string('password_hash');              // bcrypt hash
            $table->string('role');                       // mahasiswa | dosen | admin | mitra
            $table->string('id_referensi');               // FK polimorfik ke nim/nidn/id_admin/id_mitra
            $table->string('status_aktif')->default('aktif'); // aktif | nonaktif
            $table->dateTime('terakhir_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
