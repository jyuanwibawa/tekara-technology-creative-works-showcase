<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Akun extends Authenticatable
{
    use Notifiable;

    /**
     * Nama tabel.
     */
    protected $table = 'akun';

    /**
     * Primary key tabel akun.
     */
    protected $primaryKey = 'id_akun';

    /**
     * Tipe primary key bukan integer (UUID / string).
     */
    public $incrementing = false;

    /**
     * Tipe key string.
     */
    protected $keyType = 'string';

    /**
     * Atribut yang boleh diisi secara massal.
     */
    protected $fillable = [
        'id_akun',
        'username',
        'password_hash',
        'role',
        'id_referensi',
        'status_aktif',
        'terakhir_login',
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * Cast atribut.
     */
    protected $casts = [
        'terakhir_login' => 'datetime',
        'password_hash'  => 'hashed',
    ];

    /**
     * Override kolom password Laravel Auth agar membaca password_hash.
     */
    public function getAuthPassword(): string
    {
        return $this->password_hash;
    }

    // =====================================================================
    // Relasi ke entitas berdasarkan role
    // =====================================================================

    /**
     * Relasi ke Mahasiswa (role = 'mahasiswa').
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_referensi', 'nim');
    }

    /**
     * Relasi ke Dosen (role = 'dosen').
     */
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_referensi', 'nidn');
    }

    /**
     * Relasi ke Admin (role = 'admin').
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_referensi', 'id_admin');
    }

    /**
     * Relasi ke MitraIndustri (role = 'mitra').
     */
    public function mitra(): BelongsTo
    {
        return $this->belongsTo(MitraIndustri::class, 'id_referensi', 'id_mitra');
    }

    /**
     * Helper: ambil profil entitas sesuai role secara dinamis.
     */
    public function profil(): Mahasiswa|Dosen|Admin|MitraIndustri|null
    {
        return match ($this->role) {
            'mahasiswa' => $this->mahasiswa,
            'dosen'     => $this->dosen,
            'admin'     => $this->admin,
            'mitra'     => $this->mitra,
            default     => null,
        };
    }
}
