@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Admin</h2>
  <form action='/admin/tambah' method='POST'>
  {{csrf_field()}}
  <div class="form-group">
      <label for="nama">Nama Admin</label>
      <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Admin">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input name="username" type="text" class="form-control" id="username" placeholder="Masukan Username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Password">
    </div>
    <input type="hidden" name="role" value="admin">
    
    <label for="id_outlet">Pilih Outlet</label>
    <select name="id_outlet" class="form-control" id="id_outlet">
    <option selected>Pilih Outlet</option>
        @foreach($outlet as $o)
    <option value="{{$o->id}}">{{$o->nama}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="genric-btn success circle arrow">Tambah Data Admin</button>
    <a href="/admin" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection