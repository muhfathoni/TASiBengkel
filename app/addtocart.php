<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    protected $table = 'tb_cart';
    protected $fillable = ['user_id', 'produk_id'];

    public $timestamps = 'false';
}
