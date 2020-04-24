@extends('layouts.master')
@section('content')

<br>
<div class="row justify-content-md-center">
<div class="col-5">
  <h2>Tambah Data Owner</h2>
  <form action='/owner/tambah' method='POST'>
  {{csrf_field()}}
    <div class="form-group">
      <label for="nama">Nama Owner</label>
      <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Owner" required>
    </div>
    <div class="form-group">
      <label for="username">Username Owner</label>
      <input name="username" type="text" class="form-control" id="username" placeholder="Masukan Alamat Owner" required>
    </div>
    <div class="form-group">
      <label for="password">Password Owner</label>
      <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Password Owner" required>
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
    <button type="submit" class="genric-btn success circle arrow">Tambah Data Owner</button>
    <a href="/owner" class="genric-btn danger circle arrow">Batal</a>
  </form>
</div>
</div>

@endsection