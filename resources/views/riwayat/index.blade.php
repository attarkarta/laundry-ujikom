@extends('layouts.master')
@section('content')

<div class="container">
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
    <div class="col">
      <h2>Riwayat Transaksi</h2>
      @if(auth()->user()->role == 'kasir')
      <h5>Nama Kasir : {{auth()->user()->nama}}</h5>
      @elseif(auth()->user()->role == 'owner')
      <h5>Nama Owner : {{auth()->user()->nama}}</h5>
      @else(auth()->user()->role == 'admin')
      <h5>Nama Admin : {{auth()->user()->nama}}</h5>
      @endif
    </div>

    <div class="col float-right">
    <a href="/transaksi/cetakpdf" class="genric-btn success float-right">Buat Laporan</a>
  </div>

  <div class="container">
  <div class="col">
  <table class="table table-hover" style="text-align:center;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Invoice</th>
        <th scope="col">Member</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Batas Waktu</th>
        <th scope="col">Tanggal Bayar</th>
        <th scope="col">Biaya Tambahan</th>
        <th scope="col">Diskon</th>
        <th scope="col">Pajak</th>
        <th scope="col">Status</th> 
        <th scope="col">Pembayaran</th>
      </tr>
    </thead>
    <?php $no = 1; ?>
      @foreach($data_transaksi as $transaksi)
    <tbody>  
      <tr align="center">
        <td>{{$no++}}</td>
        <td>{{$transaksi->kode_invoice}}</td>
        <td>{{$transaksi->tb_member->nama}}</td>
        <td>{{$transaksi->tgl}}</td>
        <td>{{$transaksi->batas_waktu}}</td>
        <td>
        <!-- Semacem update otomatis yang sudah di dekralasikan oleh controller -->
          @if($transaksi->tgl_bayar == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->tgl_bayar}}
          @endif
        </td>

        <td>
          @if($transaksi->biaya_tambahan == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->biaya_tambahan}}
          @endif
        </td>

        <td>
          @if($transaksi->diskon == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->diskon}}
          @endif
        </td>

        <td>
          @if($transaksi->pajak == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->pajak}}
          @endif
        </td>
        
        <td>{{$transaksi->status}}</td>
        <td>{{$transaksi->dibayar}}</td>
      </tr>
    </tbody>
      @endforeach
  </table>
  </div>
  </div>
</div>

@endsection