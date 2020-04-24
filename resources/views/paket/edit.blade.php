@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h1>Edit Data Paket</h1>
  <form action='/paket/{{$paket->id}}/update' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="id_outlet">Outlet</label>
      <select name="id_outlet" class="form-control" id="id_outlet">
      <option selected>Pilih Outlet</option>
          @foreach($outlet as $o)
      <option value="{{$o->id}}">{{$o->nama}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="jenis">Jenis Paket</label>
      <select name="paket" class="form-control" id="paket">
          <option selected>Pilih Jenis Paket</option>
          <option value="kiloan" @if($paket->paket == 'kiloan') selected @endif>Kiloan</option>
          <option value="selimut" @if($paket->paket == 'selimut') selected @endif >Selimut</option>
          <option value="bed_cover" @if($paket->bed_cover == 'bed_cover') selected @endif>Bed Cover</option>
          <option value="kaos" @if($paket->kaos == 'kaos') selected @endif>Kaos</option>
          <option value="lain" @if($paket->kain == 'kain') selected @endif>Lain</option>
      </select>
    </div>
    <div class="form-group">
      <label for="nama_paket">Nama Paket</label>
      <input name="nama_paket" type="text" class="form-control" id="nama_paket" value="{{$paket->nama_paket}}">
    </div>
    <div class="form-group">
      <label for="harga">Harga Paket</label>
      <input name="harga" type="text" class="form-control" id="harga" value="{{$paket->harga}}">
    </div>
    <button type="submit" class="genric-btn warning circle arrow">Edit Data Paket</button>
    <a href="/paket" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection