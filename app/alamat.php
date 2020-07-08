<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    protected $table = 'tb_alamat';
    protected $fillable = ['customer_id', 'nama_penerima', 'alamat'];

    public function alamatcustomer(){
    	return $this->belongsTo('App\User', 'customer_id');
    }
    
}
