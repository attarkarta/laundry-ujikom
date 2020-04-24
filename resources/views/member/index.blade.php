@extends('layouts.master')
@section('content')

<div class="container col-8">
`  @if(session('sukses'))
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
      <h2>Data Member</h2>
    </div>
    <div class="col-6">
      <a href="/member/tampiltambah" class="genric-btn success circle arrow float-right">Tambah Data<span class="lnr lnr-arrow-right"></span></a>
    </div>

    <table class="table table-hover" style="text-align:center;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Member</th>
          <th scope="col">Alamat</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Telepon</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <?php $no = 1; ?>
        @foreach($data_member as $member )
        <tbody>
        <tr>
          <td>{{$no++}}</td>
          <td>{{$member->nama}}</td>
          <td>{{$member->alamat}}</td>
          <td>{{$member->jenis_kelamin}}</td>
          <td>{{$member->tlp}}</td>
          <td>
            <a href="/member/{{$member->id}}/edit" class="genric-btn warning-border small">Edit</a>
            <a href="/member/{{$member->id}}/delete" class="genric-btn danger-border small">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
@endsection