<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_member extends Model
{
    protected $table ='tb_members';
    protected $fillable =['nama','alamat','jenis_kelamin','tlp'];

    public function tb_transaksi()
    {
        return $this->hasMany(User::class)->withPivot(['nama']);
    }

    public function tb_detail_transaksi()
    {
        return $this->hasMany(tb_detail_transaksi::class,'id_member');
    }
    
}