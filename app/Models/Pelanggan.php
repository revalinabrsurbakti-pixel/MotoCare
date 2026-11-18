<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
        'id_pelanggan',
        'nama_lengkap',
        'no_hp',
        'alamat_pelanggan',
        'pekerjaan',
    ];

    protected static function booted(): void
    {
        static::creating(function ($pelanggan) {
            if (empty($pelanggan->id_pelanggan)) {
                $lastPelanggan = self::orderBy('id', 'desc')->first();

                $nomor = $lastPelanggan
                    ? ((int) substr($lastPelanggan->id_pelanggan, 3)) + 1
                    : 1;

                $pelanggan->id_pelanggan = 'PLG' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}
