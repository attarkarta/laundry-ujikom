@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Outlet</h2>
  <form action='/outlet/tambah' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="nama">Nama Outlet</label>
      <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Outlet" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Outlet</label>
      <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukan Alamat Outlet" required>
    </div>
    <div class="form-group">
      <label for="telepon">Telepon</label>
      <input name="tlp" type="text" class="form-control" id="telepon" placeholder="Masukan No Telepon" required>
    </div>
    <button type="submit" class="genric-btn success circle arrow">Tambah Data Outlet</button>
    <a href="/outlet" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection