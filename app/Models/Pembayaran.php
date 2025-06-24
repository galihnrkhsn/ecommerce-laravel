<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_order',
        'no_rekening',
        'nama_rekening',
        'jumlah_transfer',
        'bukti_transfer',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
