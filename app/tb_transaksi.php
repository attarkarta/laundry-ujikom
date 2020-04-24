<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    protected $table ='tb_transaksis';
    protected $fillable =['id_outlet','kode_invoice','id_member','tgl','batas_waktu','tgl_bayar','biaya_tambahan','diskon','pajak','status','dibayar','id_user'];

    public function tb_member()
    {
        return $this->belongsTo(tb_member::class, 'id_member');
    }

    public function tb_detail_transaksi()
    {
        return $this->belongsTo(tb_detail_transaksi::class,'id_transaksi');
    }


}