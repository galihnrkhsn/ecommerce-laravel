<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'id_pelanggan',
        'nm_penerima',
        'telp',
        'provinsi',
        'kota',
        'kode_pos',
        'alamat_pengiriman',
        'tgl_order',
        'ongkir',
        'total_order',
        'status',
        'no_resi',
    ];

    public function detail()
    {
        return $this->hasMany(DetailOrder::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }
}
