<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "tb_booking";

    protected $fillable = [
        'userid', 'nama', 'jenis_service', 'jadwal', 'jam'
    ];
}
