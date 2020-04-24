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
    <h2>Transaksi</h2>
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
        @if(Auth::user()->role != 'owner')
        <th scope="col">Konfirmasi Status</th>
        @endif
      </tr>
    </thead>
    <?php $no = 1; ?>
      @foreach($data_transaksi as $transaksi)
    <tbody>  
      <tr align="center">
        <td>{{$no++}}</td>
        <td>{{$transaksi->kode_invoice}}
        </td>
        <td>{{$transaksi->tb_member->nama}}</td>
        <td>{{$transaksi->tgl}}</td>
        <td>{{$transaksi->batas_waktu}}</td>
        <td>
        <!-- Semacem update otomatis yang sudah di dekralasikan oleh controller -->
        @if(auth()->user()->role != 'owner')
          @if($transaksi->tgl_bayar == null)
            <form action="/transaksi/tglbayar/{{$transaksi->id}}" method="POST">
              {{csrf_field()}}
              <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Sudah dibayar?')">Bayar</button>
            </form> 
          @else
            {{$transaksi->tgl_bayar}}
          @endif
    
        @elseif(auth()->user()->role == 'owner')
          @if($transaksi->tgl_bayar == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->tgl_bayar}}
          @endif
        @endif
        </td>
        <td>
        @if(auth()->user()->role != 'owner')
          @if($transaksi->biaya_tambahan == null)
            <form action="/transaksi/biayatambahan/{{$transaksi->id}}" method="POST">
              {{csrf_field()}}
            <input class="form-control text-center" type="number" id="biaya_tambahan" name="biaya_tambahan" value="0">
            </form>
          @else
            {{$transaksi->biaya_tambahan}}
          @endif
          @elseif(auth()->user()->role == 'owner')
          @if($transaksi->biaya_tambahan == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->biaya_tambahan}}
          @endif
        @endif
        </td>

        <td>
        @if(auth()->user()->role != 'owner')
          @if($transaksi->diskon == null)
            <form action="/transaksi/diskon/{{$transaksi->id}}" method="POST">
              {{csrf_field()}}
              <input class="form-control text-center" type="number" id="diskon" name="diskon" value="0">
            </form>
          @else
            {{$transaksi->diskon}}
          @endif
          @elseif(auth()->user()->role == 'owner')
          @if($transaksi->diskon == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->diskon}}
          @endif
        @endif
        </td>

        <td>
        @if(auth()->user()->role != 'owner')
          @if($transaksi->pajak == null)
          <form action="/transaksi/pajak/{{$transaksi->id}}" method="POST">
            {{csrf_field()}}
            <input class="form-control text-center" type="number" id="pajak" name="pajak" value="0">
          </form>
          @else
            {{$transaksi->pajak}}
          @endif
          @elseif(auth()->user()->role == 'owner')
          @if($transaksi->pajak == null)
            <div class="text-center"> - </div>
          @else
            {{$transaksi->pajak}}
          @endif
        @endif
        </td>
        
        <td>{{$transaksi->status}}</td>
        <td>{{$transaksi->dibayar}}</td>
        <td>
          @if(auth()->user()->role != 'owner')
          <!-- Jika statusnya baru, ditampilkan proses -->
            @if($transaksi->status == 'baru')
            <form action="/konfirmasi/selesai/{{$transaksi->id}}/proses" method="POST">
              {{csrf_field()}}
              <button type="submit" class="genric-btn primary-border small" onclick="return confirm('Transaksi Diproses?')">
              Proses</button>
            </form>
            <!-- Jika statusnya proses, maka tampilkan selesai -->
            @elseif($transaksi->status == 'proses')
            <form action="/konfirmasi/selesai/{{$transaksi->id}}/selesai" method="POST">
              {{csrf_field()}}
              <button type="submit" class="genric-btn primary-border small" onclick="return confirm('Transaksi Selesai?')">
              Selesai</button>
            </form>
            <!-- Jika statusnya selesai dan dibayar, maka tampilkan di ambil -->
            @elseif($transaksi->status == 'selesai' && $transaksi->dibayar == 'dibayar')
            <form action="/konfirmasi/selesai/{{$transaksi->id}}/diambil" method="POST">
              {{csrf_field()}}
              <button type="submit" class="genric-btn primary-border small" onclick="return confirm('Paket sudah diambil?')">
              Diambil</button>
            </form>
            <!-- Jika statusnya diambil, maka tampilkan sudah diambil -->
            @elseif($transaksi->status == 'diambil')
            <a href="#" class="genric-btn success small disabled" tabindex="-1" role="button" aria-disabled="true">
            Sudah diambil!</a>
            <!-- Jika prosesnya selesai dan belum di bayar, tampilkan Bayar dulu -->
            @elseif($transaksi->status == 'selesai' && $transaksi->dibayar == 'belum_dibayar')
            <a href="#" class="genric-btn danger small disabled" tabindex="-1" role="button" aria-disabled="true">
            Bayar Dulu!</a>
            @endif
          @endif
        </td>
      </tr>
    </tbody>
      @endforeach
  </table>
  </div>
</div>

@endsection