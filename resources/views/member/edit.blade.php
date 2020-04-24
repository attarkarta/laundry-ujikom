@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h1>Edit Data Member</h1>
  <form action='/member/{{$member->id}}/update' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="nama">Nama Member</label>
      <input name="nama" type="text" class="form-control" id="nama" value="{{$member->nama}}">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Member</label>
      <input name="alamat" type="text" class="form-control" id="alamat" value="{{$member->alamat}}">
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
      <option value="L" @if($member->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
      <option value="P" @if($member->jenis_kelamin == 'P') selected @endif >Perempuan</option>
      </select>
      </div>
    <div class="form-group">
      <label for="telepon">Telepon</label>
      <input name="tlp" type="text" class="form-control" id="telepon" value="{{$member->tlp}}">
    </div>
    <button type="submit" class="genric-btn warning circle arrow">Edit Data Member</button>
    <a href="/keranjang" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection