<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatKoordinator extends Model
{
    protected $table = 'riwayat_koordinator';

    protected $fillable = [
        'id_kelas',
        'nidn_sebelum',
        'nama_sebelum',
        'nidn_sesudah',
        'nama_sesudah',
        'nomor_sk',
        'tanggal_sk',
        'alasan',
        'ditetapkan_oleh',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_sk' => 'date',
        ];
    }
}
