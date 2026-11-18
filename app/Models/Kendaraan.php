<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';

    protected $fillable = [
        'no_plat_kendaraan',
        'pelanggan_id',
        'nama_pemilik',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan',
        'warna',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
