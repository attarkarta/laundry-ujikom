@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Edit Data Admin</h2>
  <form action='/admin/{{$data_admin->id}}/update' method='POST'>
  {{csrf_field()}}
  <div class="form-group">
    <label for="nama">Nama Admin</label>
    <input name="nama" type="text" class="form-control" id="nama" value="{{$data_admin->nama}}">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" type="text" class="form-control" id="username" value="{{$data_admin->username}}">
  </div>
  <div class="form-group">
    <label for="id_outlet">Outlet</label>
    <select name="id_outlet" class="form-control" id="id_outlet">
    <option selected>Pilih Outlet</option>
      @foreach($outlet as $o)
    <option value="{{$o->id}}">{{$o->nama}}</option>
      @endforeach
      </select>
  </div>
  <button type="submit" class="genric-btn warning circle arrow">Edit Data Admin</button>
  <a href="/admin" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection