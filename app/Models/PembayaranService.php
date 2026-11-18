<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembayaranService extends Model
{
    protected $table = 'pembayaran_services';

    protected $fillable = [
        'data_service_id',
        'jumlah_biaya_servis',
        'jenis_pembayaran',
        'keterangan',
    ];

    public function dataService(): BelongsTo
    {
        return $this->belongsTo(DataService::class);
    }
}
