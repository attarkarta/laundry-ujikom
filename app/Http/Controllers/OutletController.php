<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        // Superadmin
        if(auth()->user()->role == 'superadmin') {  
            $data_outlet = \App\tb_outlet::all();
        }

        //Admin tiap Outlet
        if(auth()->user()->role == 'admin') {  
            $data_outlet = \App\tb_outlet::where('id', '=', auth()->user()->id_outlet)->get();
        }
    return view('outlet.index', compact('data_outlet'));
    }


    public function tampiltambah()
    {
        return view('outlet.tambah'); 
    }

    public function create(Request $request){
        \App\tb_outlet::create($request->all());
        return redirect('/outlet')->with('sukses','Data berhasil diinput!');
    }

    public function edit($id)
    {
        $outlet = \App\tb_outlet::find($id);
        return view('outlet/edit', compact('outlet'));
    }

    public function update(Request $request,$id)
    {
        $outlet = \App\tb_outlet::find($id);
        $outlet->update($request->all());
        return redirect('/outlet')->with('sukses','Data berhasil diubah!');
    }

    public function delete($id)
    {
        $outlet = \App\tb_outlet::find($id);
        $outlet->delete();
        return redirect('/outlet')->with('hapus','Data berhasil dihapus!');
    }
}

