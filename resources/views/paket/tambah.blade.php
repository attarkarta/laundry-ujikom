@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Paket</h2>
  <form action='/paket/tambah' method='POST'>
  {{csrf_field()}}

    <input type="hidden" name="id_outlet" value="{{auth()->user()->id_outlet}}">
  
    <div class="form-group">
      <label for="jenis">Jenis Paket</label>
      <select name="jenis" class="form-control" id="jenis">
          <option selected disabled>- Pilih Jenis Paket -</option>
          <option value="kiloan">Kiloan</option>
          <option value="selimut">Selimut</option>
          <option value="bed_cover">Bed Cover</option>
          <option value="kaos">Kaos</option>
          <option value="lain">Lain</option>
      </select>
    </div>
    <div class="form-group">
      <label for="nama_paket">Nama Paket</label>
      <input name="nama_paket" type="text" class="form-control" id="nama_paket" required>
    </div>
    <div class="form-group">
      <label for="harga">Harga Paket</label>
      <input name="harga" type="text" class="form-control" id="harga" required>
    </div>
    <button type="submit" class="genric-btn success circle arrow">Tambah Data Paket</button>
    <a href="/paket" class="genric-btn danger circle arrow">Batal</a>
    
  </form>
</div>
</div>

@endsection