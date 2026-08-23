<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Model
{
    /**
     * Primary key tabel admin.
     */
    protected $primaryKey = 'id_admin';

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
        'id_admin',
        'nama_admin',
        'email',
        'unit_kerja',
        'status_aktif',
    ];

    /**
     * Relasi ke tabel akun.
     * Setiap admin memiliki satu akun (id_referensi = id_admin).
     */
    public function akun(): HasOne
    {
        return $this->hasOne(Akun::class, 'id_referensi', 'id_admin');
    }
}
