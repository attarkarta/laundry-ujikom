<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
 
class AdminController extends Controller
{
    public function index()
    {
        $data_admin = User::where('role', '=', 'admin')->get();
        return view('admin.index',compact('data_admin'));
    }

    public function tampiltambah()
    {
        $outlet = \App\tb_outlet::all();
        return view('admin.tambah',compact('outlet')); 
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect('/admin')->with('sukses','Data berhasil diinput!');
    }
    
    public function edit($id)
    {
        $outlet = \App\tb_outlet::all();
        $data_admin = User::find($id);
        return view('admin.edit',compact('data_admin','outlet'));
    }

    public function update(Request $request,$id)
    {
        $data_admin = User::find($id);
        $data_admin->update($request->all());
        return redirect('/admin')->with('sukses','Data berhasil diubah!');
    }

    public function delete($id)
    {
        $data_admin = User::find($id);
        $data_admin->delete();
        return redirect('/admin')->with('hapus','Data berhasil dihapus!');
    }
}
