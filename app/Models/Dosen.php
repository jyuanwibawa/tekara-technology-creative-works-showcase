<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosen extends Model
{
    /**
     * Primary key tabel dosen.
     */
    protected $primaryKey = 'nidn';

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
        'nidn',
        'nama_dosen',
        'email',
        'jabatan_fungsional',
        'bidang_keahlian',
    ];

    /**
     * Relasi ke tabel akun.
     * Setiap dosen memiliki satu akun (id_referensi = nidn).
     */
    public function akun(): HasOne
    {
        return $this->hasOne(Akun::class, 'id_referensi', 'nidn');
    }
}
