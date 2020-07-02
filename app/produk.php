<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['jenis_id', 'nama', 'deskrip', 'stock', 'harga', '01_gambar_a', 'gambar_b', '01_gambar_c'];

    public $timestamps = 'false';

    public function produk(){
    	return $this->hasMany('App\addtocart', 'produk_id');
    }

    public function transaksi(){
        return $this->hasMany('App\transaksibarang', 'id_barang');
    }

    public function changeQty($status)
    {
        if ($status == 'settlement' || $status == 'pending') {
            $this->stock = $this->stock - 1;
        } else {
            $this->stock = $this->stock + 1;
        }
    }

    public function jenis(){
    	return $this->belongsTo('App\jenis', 'jenis_id');
    }

     public function pembelian(){
        return $this->hasMany('App\pembelianbarang', 'produk_id');
    }
    
}
