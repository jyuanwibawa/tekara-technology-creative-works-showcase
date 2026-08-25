<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KelasCapstone extends Model
{
    protected $table = 'kelas_capstone';
    protected $primaryKey = 'id_kelas';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kelas',
        'kode_mk',
        'nidn_koordinator',
        'tahun_akademik',
        'periode_semester',
        'kuota_tim',
    ];

    protected $casts = [
        'kuota_tim' => 'integer',
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    public function koordinator(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'nidn_koordinator', 'nidn');
    }
}
