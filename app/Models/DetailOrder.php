<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_order';
    protected $primaryKey = 'id_detail_order';

    protected $fillable = [
        'id_order',
        'id_produk',
        'nm_produk',
        'harga',
        'jml_order',
        'berat',
        'subberat',
        'subharga',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
