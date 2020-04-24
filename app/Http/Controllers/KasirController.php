<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class KasirController extends Controller
{
    public function index()
    {
        // Superadmin
        if(auth()->user()->role == 'superadmin') {  
            $data_kasir = User::where('role', '=', 'kasir')->get();
        }

        //Admin tiap Outlet
        if(auth()->user()->role == 'admin') {  
            $data_kasir = User::where('role', '=', 'kasir')->where('id_outlet', '=', auth()->user()->id_outlet)->get();;
        }
        
        return view('kasir.index' ,compact('data_kasir'));
    }
    
    public function tampiltambah()
    {
       
        $outlet = \App\tb_outlet::all();
        return view('kasir.tambah',compact('outlet'));
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'kasir';
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect('/kasir')->with('sukses','Data berhasil diinput!');
        
    }

    public function edit(Request $request,$id)
    {
        $kasir = \App\User::find($id);
        $outlet = \App\tb_outlet::all();
        return view('kasir.edit', compact('kasir','outlet')); 
    }

    public function update(Request $request,$id)
    {
        $user = \App\User::find($id);
        $user->update($request->all());
        return redirect('/kasir')->with('sukses','Data berhasil diubah');
    }

    public function delete($id)
    {
        $kasir = \App\User::find($id);
        $kasir->delete();
        return redirect('/kasir')->with('hapus','Data berhasil dihapus!');
    }

}
