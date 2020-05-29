<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inputmitra extends Model
{
	protected $table = "tb_inputmitra";

	protected $fillable = [ 'nama', 'deskripsi', 'gambar'];

	
}
