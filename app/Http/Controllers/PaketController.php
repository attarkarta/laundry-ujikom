<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Superadmin
        if(auth()->user()->role == 'superadmin') {  
            $data_paket = \App\tb_paket::all();
        }

        //Admin tiap Outlet
        if(auth()->user()->role == 'admin') {  
            $data_paket = \App\tb_paket::where('id_outlet', '=', auth()->user()->id_outlet)->get();
        }

        
        return view('paket.index',compact('data_paket'));
    }

    public function tampiltambah()
    {
        $outlet = \App\tb_outlet::all();
        return view('paket.tambah',compact('outlet'));
    }

    public function create(Request $request)
    {
        \App\tb_paket::create($request->all());
        return redirect('/paket')->with('sukses','Data berhasil diinput!');
    }
    

    public function edit(Request $request,$id)
    {
        $outlet = \App\tb_outlet::all();
        $paket = \App\tb_paket::find($id);
        return view('paket.edit',compact('paket','outlet'));
    }

    public function update(Request $request,$id)
    {
        $paket = \App\tb_paket::find($id);
        $paket->update($request->all());
        return redirect('/paket')->with('sukses','Data berhasil diedit!');
    }

    public function delete($id)
    {
        $paket = \App\tb_paket::find($id);
        $paket->delete();
        return redirect('/paket')->with('hapus', 'Data berhasil dihapus!');
    }
}

