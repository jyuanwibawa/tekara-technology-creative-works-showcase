<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MitraIndustri extends Model
{
    /**
     * Nama tabel yang digunakan.
     */
    protected $table = 'mitra_industri';

    /**
     * Primary key tabel mitra_industri.
     */
    protected $primaryKey = 'id_mitra';

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
        'id_mitra',
        'nama_mitra',
        'jenis_mitra',
        'kontak_person',
        'alamat',
    ];

    /**
     * Relasi ke tabel akun.
     * Setiap mitra industri memiliki satu akun (id_referensi = id_mitra).
     */
    public function akun(): HasOne
    {
        return $this->hasOne(Akun::class, 'id_referensi', 'id_mitra');
    }
}
