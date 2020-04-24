@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Member</h2>
  <form action='/member/tambah' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="nama">Nama Member</label>
      <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Member" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Member</label>
      <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukan Alamat Member" required>
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin Member</label>
      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">Pilih Jenis Kelamin
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="telepon">Telepon</label>
      <input name="tlp" type="text" class="form-control" id="telepon" placeholder="Masukan No Telepon" required>
    </div>
    <button type="submit" class="genric-btn success circle arrow">Tambah Data Member</button>
    <a href="/member" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection