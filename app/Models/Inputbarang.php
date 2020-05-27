<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inputbarang extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = ['nama','deskrip','stock','harga','gambar_b'];
    
    public $timestamps = false;
}


