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
    <h2>Data Paket</h2>
  </div>
  <div class="col-6">
      <a href="/paket/tampiltambah" class="genric-btn success circle arrow float-right">Tambah Data<span class="lnr lnr-arrow-right"></span></a>
  </div>
  <table class="table table-hover" style="text-align:center;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Outlet</th>
        <th scope="col">Jenis</th>
        <th scope="col">Nama Paket</th>
        <th scope="col">Harga</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <?php $no = 1; ?>
      @foreach($data_paket as $paket )
    <tbody>  
      <tr>
        <td>{{$no++}}</td>
        <td>{{$paket->tb_outlet->nama}}</td>
        <td>{{$paket->jenis}}</td>
        <td>{{$paket->nama_paket}}</td>
        <td>{{$paket->harga}}</td>
        <td>
          <a href="/paket/{{$paket->id}}/edit" class="genric-btn warning-border small">Edit</a>
          <a href="/paket/{{$paket->id}}/delete" class="genric-btn danger-border small">Hapus</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>

@endsection