@extends('layouts.master')
@section('content')

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
  <h1>Detail Transaksi</h1>
</div>

<div class="container">
<div class="col">
<table class="table table-hover" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Invoice</th>
      <th scope="col">Member</th>
      <th scope="col">Nama Paket</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Total Harga</th>

      <th scope="col">Biaya Tambahan</th>
      <th scope="col">Pajak</th>
      <th scope="col">Diskon</th> 
      <th scope="col">Total Pembayaran</th>
    </tr>
  </thead>
  <?php $no = 1; ?>
    @foreach($data_transaksi as $transaksi)
  <tbody>  
    <tr align="center">
      <td>{{$no++}}</td>
      <td>{{$transaksi->kode_invoice}}</td>
      <td>{{$transaksi->tb_member->nama}}</td>
      <td>{{$transaksi->tb_paket->nama_paket}}</td>
      </td>
    </tr>
  </tbody>
    @endforeach
</table>
</div>
</div>

@endsection