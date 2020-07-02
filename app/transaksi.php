<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table= 'tb_transaksi';
    protected $fillable = ['id_user','total','status','created_at','updated_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

    public function barangtransaksi()
    {
        return $this->hasMany('App\transaksibarang','id_order');
    }

}
