<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "tb_booking";

    protected $fillable = [
        'nama', 'jenis_service', 'jadwal',
    ];
}
