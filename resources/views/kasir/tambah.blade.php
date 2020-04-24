@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Kasir</h2>
<form action='/kasir/tambah' method='POST'>
{{csrf_field()}}
  <div class="form-group">
    <label for="nama">Nama Kasir</label>
    <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Kasir" required>
  </div>
  <div class="form-group">
    <label for="username">Username Kasir</label>
    <input name="username" type="text" class="form-control" id="username" placeholder="Masukan Alamat Kasir" required>
  </div>
  <div class="form-group">
    <label for="password">Password Kasir</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Alamat Kasir" required>
  </div>
 <!-- Superadmin -->
  @if(auth()->user()->role == 'superadmin')
    <label for="id_outlet">Outlet</label>
      <select name="id_outlet" class="form-control" id="id_outlet">
      <option selected disabled>- Pilih Outlet -</option>
          @foreach($outlet as $o)
      <option value="{{$o->id}}">{{$o->nama}}</option>
          @endforeach
      </select>
    <!-- Admin -->
    @elseif(auth()->user()->role == 'admin')
    <input type="hidden" name="id_outlet" value="{{auth()->user()->id_outlet}}">
  @endif
  <br>
  <button type="submit" class="genric-btn success circle arrow">Tambah Data Kasir</button>
  <a href="/kasir" class="genric-btn danger circle arrow">Batal</a>
</form>
</div>
</div>

@endsection