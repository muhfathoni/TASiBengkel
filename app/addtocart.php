<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    protected $table = 'tb_cart';
    protected $fillable = ['user_id', 'produk_id'];

    public $timestamps = 'false';

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function produk(){
    	return $this->belongsTo('App\produk', 'produk_id');
    }
}
