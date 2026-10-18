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

        DB::table('program_studi')->upsert([
            [
                'id_prodi' => 'TI',
                'kode_prodi' => '55201',
                'nama_prodi' => 'Teknik Informatika',
                'akreditasi_nasional' => 'Unggul',
                'akreditasi_internasional' => 'IABEE',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_prodi' => 'SI',
                'kode_prodi' => '57201',
                'nama_prodi' => 'Sistem Informasi',
                'akreditasi_nasional' => 'Unggul',
                'akreditasi_internasional' => null,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_prodi' => 'TK',
                'kode_prodi' => '55202',
                'nama_prodi' => 'Teknik Komputer',
                'akreditasi_nasional' => 'Baik Sekali',
                'akreditasi_internasional' => null,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_prodi'], ['kode_prodi', 'nama_prodi', 'akreditasi_nasional', 'akreditasi_internasional', 'updated_at']);

        DB::table('mata_kuliah')->upsert([
            [
                'kode_mk' => 'CAP001',
                'id_prodi' => 'TI',
                'nama_mk' => 'Capstone Project',
                'sks' => 4,
                'semester' => 7,
                'deskripsi_mk' => 'Perancangan dan pengembangan solusi teknologi secara berkelompok.',
                'referensi_panduan' => 'Panduan Capstone Project 2026',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'kode_mk' => 'CAP002',
                'id_prodi' => 'SI',
                'nama_mk' => 'Proyek Sistem Informasi',
                'sks' => 4,
                'semester' => 7,
                'deskripsi_mk' => 'Implementasi sistem informasi untuk menyelesaikan kebutuhan organisasi.',
                'referensi_panduan' => 'Panduan Proyek Sistem Informasi 2026',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'kode_mk' => 'CAP003',
                'id_prodi' => 'TK',
                'nama_mk' => 'Proyek Teknologi Komputer',
                'sks' => 4,
                'semester' => 7,
                'deskripsi_mk' => 'Pengembangan solusi perangkat keras dan perangkat lunak terintegrasi.',
                'referensi_panduan' => 'Panduan Proyek Teknologi Komputer 2026',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'kode_mk' => 'CAP004',
                'id_prodi' => 'TI',
                'nama_mk' => 'Pengembangan Aplikasi Mobile',
                'sks' => 3,
                'semester' => 6,
                'deskripsi_mk' => 'Perancangan aplikasi mobile yang berorientasi pada kebutuhan pengguna.',
                'referensi_panduan' => 'Panduan Pengembangan Aplikasi Mobile 2026',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['kode_mk'], ['id_prodi', 'nama_mk', 'sks', 'semester', 'deskripsi_mk', 'referensi_panduan', 'updated_at']);

        DB::table('kelas_capstone')->upsert([
            [
                'id_kelas' => 'KLS-CAP-2026-A1',
                'kode_mk' => 'CAP001',
                'nidn_koordinator' => '0123456789',
                'tahun_akademik' => '2025/2026',
                'periode_semester' => 'Genap',
                'kuota_tim' => 10,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_kelas' => 'KLS-CAP-2026-B1',
                'kode_mk' => 'CAP002',
                'nidn_koordinator' => '0987654321',
                'tahun_akademik' => '2025/2026',
                'periode_semester' => 'Genap',
                'kuota_tim' => 8,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_kelas' => 'KLS-CAP-2026-C1',
                'kode_mk' => 'CAP003',
                'nidn_koordinator' => '0123456789',
                'tahun_akademik' => '2025/2026',
                'periode_semester' => 'Genap',
                'kuota_tim' => 6,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'id_kelas' => 'KLS-CAP-2026-D1',
                'kode_mk' => 'CAP004',
                'nidn_koordinator' => '0987654321',
                'tahun_akademik' => '2025/2026',
                'periode_semester' => 'Genap',
                'kuota_tim' => 10,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_kelas'], ['kode_mk', 'nidn_koordinator', 'tahun_akademik', 'periode_semester', 'kuota_tim', 'updated_at']);

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
                'id_referen     si' => 'MITRA001',
                'status_aktif' => 'aktif',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ], ['id_akun'], ['username', 'password_hash', 'role', 'id_referensi', 'status_aktif', 'updated_at']);
    }
}
