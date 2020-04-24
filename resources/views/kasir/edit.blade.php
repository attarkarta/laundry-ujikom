@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Edit Data Kasir</h2>
  <form action='/kasir/{{$kasir->id}}/update' method='POST'>
  {{csrf_field()}}
  <div class="form-group">
    <label for="nama">Nama Kasir</label>
    <input name="nama" type="text" class="form-control" id="nama" value="{{$kasir->nama}}">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" type="text" class="form-control" id="username" value="{{$kasir->username}}">
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
  <button type="submit" class="genric-btn warning circle arrow">Edit Data Kasir</button>
  <a href="/kasir" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection