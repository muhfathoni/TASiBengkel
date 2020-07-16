<?php

namespace App;
use App\pembelianbarang;

use Illuminate\Database\Eloquent\Model;

class pembelianbarang extends Model
{
    protected $table = 'tb_pembelianbarang';
    protected $fillable = ['customer_id', 'produk_id', 'status', 'totalHarga', 'created_at', 'bukti_pembayaran'];

    public function customer(){
    	return $this->belongsTo('App\User', 'customer_id');
    }

    public function dataproduk(){
    	return $this->belongsTo('App\produk', 'produk_id');
    }
}
