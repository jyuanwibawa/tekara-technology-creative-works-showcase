<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    /**
     * Primary key tabel mahasiswa.
     */
    protected $primaryKey = 'nim';

    /**
     * Tipe primary key bukan integer.
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
        'nim',
        'id_prodi',
        'nama_mahasiswa',
        'angkatan',
        'ipk',
        'status_akademik',
    ];

    /**
     * Cast atribut.
     */
    protected $casts = [
        'angkatan' => 'integer',
        'ipk'      => 'decimal:2',
    ];

    /**
     * Relasi ke tabel akun.
     * Setiap mahasiswa memiliki satu akun (id_referensi = nim).
     */
    public function akun(): HasOne
    {
        return $this->hasOne(Akun::class, 'id_referensi', 'nim');
    }
}
