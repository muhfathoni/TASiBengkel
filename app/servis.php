<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class servis extends Model
{
    protected $table = 'tb_servis';
    protected $fillable = ['id_bengkel', 'nama_servis', 'harga'];

    public $timestamps = 'false';

    public function servis(){
        return $this->belongsTo('App\User', 'id_bengkel');
    }
}
