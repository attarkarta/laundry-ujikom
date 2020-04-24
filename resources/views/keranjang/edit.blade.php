@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Edit Data Keranjang</h2>
  <form action='/keranjang/{{$keranjang->id}}/update' method='POST'>
    {{csrf_field()}}
      <div class="form-group">
        <label for="nama_paket">Nama Paket</label>
        <input name="nama_paket" type="text" class="form-control" id="nama_paket" value="{{$keranjang->tb_paket->nama_paket}}" disabled>
      </div>
      <div class="form-group">
        <label for="harga">Harga</label>
        <input name="harga" type="text" class="form-control" id="harga" value="{{$keranjang->tb_paket->harga}}" disabled>
      </div>
      <div class="form-group">
        <label for="qty">Jumlah</label>
        <input name="qty" type="text" class="form-control" id="qty" value="{{$keranjang->qty}}">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="keterangan" value="{{$keranjang->keterangan}}">
      </div>
      <div class="form-group">
        <label for="totalharga">Total Harga</label>
        <input name="totalharga" type="text" class="form-control" id="totalharga" value="{{$keranjang->tb_paket->harga*$keranjang->qty}}" disabled>
      </div>
      <button type="submit" class="genric-btn warning circle arrow">Edit Data Member</button>
      <a href="/keranjang" class="genric-btn danger circle arrow">Batal</a>
      
  </form>
</div>
</div>

@endsection