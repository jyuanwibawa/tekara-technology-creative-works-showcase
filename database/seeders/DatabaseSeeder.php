<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $timestamp = now();

        DB::table('mahasiswa')->upsert([
            [
                'nim' => '2301001',
                'id_prodi' => 'TI',
                'nama_mahasiswa' => 'Alya Putri Ramadhan',
                'angkatan' => 2023,
                'ipk' => 3.75,
                'status_akademik' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'nim' => '2301002',
                'id_prodi' => 'SI',
                'nama_mahasiswa' => 'Bima Aditya Pratama',
                'angkatan' => 2023,
                'ipk' => 3.52,
                'status_akademik' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['nim'], ['id_prodi', 'nama_mahasiswa', 'angkatan', 'ipk', 'status_akademik', 'updated_at']);

        DB::table('dosen')->upsert([
            [
                'nidn' => '0123456789',
                'nama_dosen' => 'Dr. Rina Kusuma, S.Kom., M.Kom.',
                'email' => 'rina.kusuma@example.com',
                'jabatan_fungsional' => 'Lektor',
                'bidang_keahlian' => 'Rekayasa Perangkat Lunak',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'nidn' => '0987654321',
                'nama_dosen' => 'Fajar Nugroho, S.T., M.T.',
                'email' => 'fajar.nugroho@example.com',
                'jabatan_fungsional' => 'Asisten Ahli',
                'bidang_keahlian' => 'Sistem Informasi',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['nidn'], ['nama_dosen', 'email', 'jabatan_fungsional', 'bidang_keahlian', 'updated_at']);

        DB::table('admin')->upsert([
            [
                'id_admin' => 'ADM001',
                'nama_admin' => 'Nadia Permatasari',
                'email' => 'admin@example.com',
                'unit_kerja' => 'Biro Akademik',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_admin'], ['nama_admin', 'email', 'unit_kerja', 'status_aktif', 'updated_at']);

        DB::table('mitra_industri')->upsert([
            [
                'id_mitra' => 'MITRA001',
                'nama_mitra' => 'PT Tekara Digital Nusantara',
                'jenis_mitra' => 'perusahaan',
                'kontak_person' => 'Dewi Lestari',
                'alamat' => 'Jl. Teknologi No. 10, Jakarta',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_mitra'], ['nama_mitra', 'jenis_mitra', 'kontak_person', 'alamat', 'updated_at']);

        DB::table('akun')->upsert([
            [
                'id_akun' => 'AKUN001',
                'username' => 'alya.putri',
                'password_hash' => Hash::make('password'),
                'role' => 'mahasiswa',
                'id_referensi' => '2301001',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_akun' => 'AKUN002',
                'username' => 'rina.kusuma',
                'password_hash' => Hash::make('password'),
                'role' => 'dosen',
                'id_referensi' => '0123456789',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_akun' => 'AKUN003',
                'username' => 'admin',
                'password_hash' => Hash::make('password'),
                'role' => 'admin',
                'id_referensi' => 'ADM001',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_akun' => 'AKUN004',
                'username' => 'tekara.digital',
                'password_hash' => Hash::make('password'),
                'role' => 'mitra',
                'id_referensi' => 'MITRA001',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_akun'], ['username', 'password_hash', 'role', 'id_referensi', 'status_aktif', 'updated_at']);
    }
}
