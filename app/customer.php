<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable
{

	use Notifiable;
	
    protected $table = 'tb_user';
    protected $fillable = ['nama', 'email', 'password'];

    public $timestamps = 'false';
}
