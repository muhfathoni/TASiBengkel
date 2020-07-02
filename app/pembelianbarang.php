<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelianbarang extends Model
{
    protected $table = 'tb_pembelianbarang';
    protected $fillable = ['customer_id', 'produk_id'];

    public function customer(){
    	return $this->belongsTo('App\User', 'customer_id');
    }

    public function dataproduk(){
    	return $this->belongsTo('App\produk', 'produk_id')
    }
}


}
