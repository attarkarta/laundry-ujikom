@extends('layouts.master')
@section('content')

<div class="container col-8">
  
@if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif

@if(session('hapus'))
<div class="alert alert-danger" role="alert">
  {{session('hapus')}}
</div>
@endif

<br>

<div class="row">
<div class="col-6">
  <h2>Pilih Paket</h2>
</div>
<table class="table table-hover" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Jenis</th>
      <th scope="col">Harga</th>
      <th scope="col">Outlet</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php $no = 1; ?>
    @foreach($pilihpaket as $pp )
  <tbody>
    <tr>
      <td>{{$no++}}</td>
      <td>{{$pp->nama_paket}}</td>
      <td>{{$pp->jenis}}</td>
      <td>{{$pp->harga}}</td>
      <td>{{$pp->tb_outlet->nama}}</td>
      <form action="{{action('KeranjangController@store',$pp->id)}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="id_paket" value="{{$pp->id}}">
        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
        <td><input class="form-control" type="text"  placeholder="Jumlah Pesanan" name="qty"></td>
        <td><input class="form-control" type="text"  placeholder="(Opsional)" name="keterangan"></td>
        <td>
          <button class="genric-btn primary-border small">Masukan Keranjang</button>
        </td>
      </form>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@endsection