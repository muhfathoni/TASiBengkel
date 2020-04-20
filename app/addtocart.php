<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    protected $table = 'tb_pembelianbarang';
    protected $fillable = ['customer_id', 'produk_id', 'namabarang', 'hargabarang'];

    public $timestamps = 'false';
}
