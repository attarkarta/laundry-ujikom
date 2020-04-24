<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilih extends Model
{
    protected $table ='Pilih';
    protected $fillable = ['id_outlet','jenis','nama_paket','harga'];

    public function tb_outlet()
    {
        return $this->belongsTo(tb_outlet::class,'id_outlet');
    }


}
