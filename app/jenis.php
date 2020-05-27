<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table = 'tb_jenis';
    protected $fillable = ['namajenis'];

    public $timestamps = 'false';

    public function produk(){
    	return $this->hasMany('App\produk', 'jenis_id');
    }
}
