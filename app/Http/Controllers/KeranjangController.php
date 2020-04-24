<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_detail_transaksi;
use App\tb_paket;
use App\tb_member;



class KeranjangController extends Controller
{
    public function index()
    {
       
        $data_keranjang = tb_detail_transaksi::where('id_user', '=', auth()->user()->id)->get();
        $member = tb_member::all();
        return view('keranjang.index', compact('data_keranjang','member'));
    }

    public function store(Request $request,$id)
    {
        $data_keranjang = new tb_detail_transaksi;
        $data_keranjang->id_paket = $request->id_paket;
        $data_keranjang->qty = $request->qty;
        $data_keranjang->id_user = auth()->user()->id;
        $data_keranjang->keterangan = $request->keterangan;
        $data_keranjang->save();

        return redirect('/keranjang');
    }

    public function edit($id)
    {
        $paket = tb_paket::all();
        $keranjang = tb_detail_transaksi::find($id);
        return view('/keranjang.edit',compact('keranjang','paket'));
    }

    public function update(Request $request,$id)
    {
        $keranjang = tb_detail_transaksi::find($id);
        $keranjang->update($request->all());
        return redirect('/keranjang')->with('sukses','Data berhasil diubah!');
    }

    public function delete($id)
    {
        $keranjang = tb_detail_transaksi::find($id);
        $keranjang->delete();
        return redirect('/keranjang')->with('hapus','Data berhasil dihapus!');
    }
}
