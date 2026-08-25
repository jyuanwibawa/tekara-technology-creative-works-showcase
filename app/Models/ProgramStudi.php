<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'id_prodi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_prodi',
        'kode_prodi',
        'nama_prodi',
        'akreditasi_nasional',
        'akreditasi_internasional',
    ];

    public function mataKuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_prodi', 'id_prodi');
    }
}
