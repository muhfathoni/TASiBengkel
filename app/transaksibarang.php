<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksibarang extends Model
{
    protected $table = 'tb_pivot_transaksi_barang';
    protected $fillable = ['id_order','id_barang'];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\transaksi','id_order');
    }

    public function barang()
    {
        return $this->belongsTo('App\produk','id_barang');
    }
}
