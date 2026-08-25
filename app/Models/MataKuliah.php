<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'id_prodi',
        'nama_mk',
        'sks',
        'semester',
        'deskripsi_mk',
        'referensi_panduan',
    ];

    protected $casts = [
        'sks' => 'integer',
        'semester' => 'integer',
    ];

    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi', 'id_prodi');
    }

    public function kelasCapstone(): HasMany
    {
        return $this->hasMany(KelasCapstone::class, 'kode_mk', 'kode_mk');
    }
}
