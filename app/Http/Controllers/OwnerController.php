<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class OwnerController extends Controller
{
    public function index()
    {
        // Superadmin
        if(auth()->user()->role == 'superadmin') {  
            $data_owner = User::where('role', '=', 'owner')->get();
        }

        //Admin tiap Outlet
        if(auth()->user()->role == 'admin') {  
            $data_owner = User::where('role', '=', 'owner')->where('id_outlet', '=', auth()->user()->id_outlet)->get();;
        }
        return view('owner.index', compact ('data_owner'));
    }

    public function tampiltambah()
    {
        $outlet = \App\tb_outlet::all();
        return view('owner.tambah', compact('outlet'));
    }

    public function create(Request $request)
    {
        
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'owner';
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect('/owner')->with('sukses','Data berhasil diinput!');
    }

    public function delete($id)
    {
        $owner = \App\User::find($id);
        $owner->delete();
        return redirect('/owner')->with('hapus','Data berhasil dihapus!');
    }
}

