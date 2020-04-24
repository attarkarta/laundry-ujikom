<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data_member = \App\tb_member::all();
        return view('member.index',compact('data_member'));
    }

    public function tampiltambah()
    {
        return view('member.tambah'); 
    }

    public function create(Request $request)
    {
        \App\tb_member::create($request->all());
        return redirect('/member')->with('sukses','Data berhasil diinput!');
    }
    
    public function edit($id)
    {
        $member = \App\tb_member::find($id);
        return view('member.edit',compact('member'));
    }

    public function update(Request $request,$id)
    {
        $member = \App\tb_member::find($id);
        $member->update($request->all());
        return redirect('/member')->with('sukses','Data berhasil diubah!');
    }

    public function delete($id)
    {
        $member = \App\tb_member::find($id);
        $member->delete();
        return redirect('/member')->with('hapus','Data berhasil dihapus!');
    }
    
}
