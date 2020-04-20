<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['jenis_id', 'nama', 'deskrip', 'stock', 'harga', '01_gambar_a', 'gambar_b', '01_gambar_c'];

    public $timestamps = 'false';
}
