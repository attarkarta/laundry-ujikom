<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_outlet extends Model
{
    protected $table ='tb_outlets';
    protected $fillable =['nama','alamat','tlp'];
    
    public function tb_paket()
    {
        return $this->hasMany(User::class)->withPivot(['nama']);
    }

    public function User()
    {
        return $this->hasMany(User::class)->withPivot(['nama']);
    }
    
}


