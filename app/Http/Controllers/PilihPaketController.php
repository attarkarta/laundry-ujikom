<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PilihPaketController extends Controller
{
    public function index()
    {
        $pilihpaket = \App\tb_paket::where('id_outlet','=',auth()->user()->id_outlet)->get();
        return view('pilihpaket.index', compact('pilihpaket'));
    }
}
