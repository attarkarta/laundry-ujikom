<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_paket extends Model
{
    protected $table ='tb_pakets';
    protected $fillable =['id_outlet','jenis','nama_paket','harga'];

    public function tb_outlet()
    {
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }

    public function tb_detail_transaksi()
    {
        return $this->hasMany(tb_detail_transaksi::class,'id_paket');
    }

    public function tb_transaksi()
    {
        return $this->hasMany(tb_transaksi::class,'id_paket');
    }
}
