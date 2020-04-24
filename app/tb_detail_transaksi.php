<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_detail_transaksi extends Model
{
    protected $table = 'tb_detail_transaksis';
    protected $fillable =['id_transaksi','id_paket','qty','id_user','keterangan'];

    public function tb_paket()
    {
        return $this->belongsTo(tb_paket::class, 'id_paket');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function tb_member()
    {
        return $this->belongsTo(tb_member::class,'id_member');
    }
    
    public function tb_transaksi()
    {
        return $this->hasMany(tb_transaksi::class,'id_transaksi');
    }
  

}
