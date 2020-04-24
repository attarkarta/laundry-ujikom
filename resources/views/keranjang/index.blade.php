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
  <h2>Keranjang Pesananan</h2>
</div>

<div class="col float-right">
  <form action="/posttransaksi" method='POST'>
  {{csrf_field()}}

  <div class="input-group col-md-9 float-right">
    <select name="id_member" class="form-control" id="id_member">
        <option disabled selected>- Pilih Member -</option>
            @foreach($member as $m)
        <option value="{{$m->id}}">{{$m->nama}}</option>
            @endforeach
    </select>
        <input name="date" class="date from-control col-md-5" type="date" placeholder="Batas Waktu">

    <div class="input-group-append">
    <button class="btn btn-secondary float-right">Pesan</button>
    </div>

  </form>
  </div>
</div>
<table class="table table-hover" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <?php $no = 1; ?>
    @foreach($data_keranjang as $keranjang )
  <tbody>  
    <tr>
      <td>{{$no++}}</td>
      <td>{{$keranjang->tb_paket->nama_paket}}</td>
      <td>{{$keranjang->tb_paket->harga}}</td>
      <td>{{$keranjang->qty}}</td>
      <td> @if($keranjang->keterangan == null)
          <div class="text-center"> - </div>
        @else
          {{$keranjang->keterangan}}
        @endif</td>
      <td>{{$keranjang->tb_paket->harga*$keranjang->qty}}</td>
      <input type="hidden" name="id_outlet" value="auth()->user()->id_outlet">
      <input type="hidden" name="id_user" value="{{$keranjang->id}}">
      <td>
        <a href="/keranjang/{{$keranjang->id}}/edit" class="genric-btn warning-border small">Edit</a>
        <a href="/keranjang/{{$keranjang->id}}/delete" class="genric-btn danger-border small">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@endsection