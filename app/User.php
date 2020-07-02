<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(){
        return $this->hasMany('App\addtocart', 'user_id');
    }

     public function servis(){
        return $this->hasMany('App\servis', 'id_bengkel');
    }

    public function transaksi(){
        return $this->hasMany('App\transaksi', 'id_user');
    }

    public function pembelian(){
        return $this->hasMany('App\pembelianbarang', 'customer_id');
    }

    public function alamat(){
        return $this->hasMany('App\alamat', 'customer_id');
    }
}

