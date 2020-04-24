@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h1>Edit Data Outlet</h1>
  <form action='/outlet/{{$outlet->id}}/update' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="nama">Nama Outlet</label>
      <input name="nama" type="text" class="form-control" id="nama" value="{{$outlet->nama}}">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Outlet</label>
      <input name="alamat" type="text" class="form-control" id="alamat" value="{{$outlet->alamat}}">
    </div>
    <div class="form-group">
      <label for="telepon">Telepon</label>
      <input name="tlp" type="text" class="form-control" id="telepon" value="{{$outlet->tlp}}">
    </div>
    <button type="submit" class="genric-btn warning circle arrow">Edit Data Outlet</button>
    <a href="/outlet" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection