<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $table = "tb_booking";

	protected $fillable = [
		'userid', 'nama', 'jenis_service', 'jadwal', 'jam', 'revenue', 'bukti_pembayaran'
	];

	public function namaservis(){
		return $this->belongsTo('App\servis', 'jenis_service');
	}

	public function namabengkel(){
		return $this->belongsTo('App\User', 'id_bengkel');
	}
}
