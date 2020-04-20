<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mitra extends Model
{
    protected $table = 'tb_mitra';
    protected $fillable = ['namaBengkel', 'emailPemilik', 'namaPemilik', 'telpPemilik', 'alamatBengkel', 'kecamatanBengkel', 'kelurahanBengkel', 'provinsiBengkel'];

    public $timestamps = 'false';
}
