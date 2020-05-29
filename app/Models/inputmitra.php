<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inputmitra extends Model
{
    protected $table = 'tb_tambahmitra';
    protected $fillable = ['nama','deskripsi','gambar'];
    
    public $timestamps = false;
}


