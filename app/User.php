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
        'nama', 'username', 'password', 'id_outlet', 'role' , 'nama_paket'
    ];
    public function tb_outlet()
    {
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }

    public function tb_paket()
    {
        return $this->hasMany(User::class)->withPivot(['nama']);
    }

    public function tb_detail_transaksi()
    {
        return $this->hasMany(tb_detail_transaksi::class,'id_transaksi');
    }



    
    
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
}
