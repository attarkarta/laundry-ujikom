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
      <h2>Data Outlet</h2>
    </div>

    <div class="col-6">
      <a href="/outlet/tampiltambah" class="genric-btn success circle arrow float-right">Tambah Data<span class="lnr lnr-arrow-right"></span></a>
    </div>

    <table class="table table-hover" style="text-align:center;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Outlet</th>
          <th scope="col">Alamat</th>
          <th scope="col">Telepon</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
        <?php $no = 1; ?>
        @foreach($data_outlet as $outlet )
        <tbody>
        <tr>
          <td>{{$no++}}</td>
          <td>{{$outlet->nama}}</td>
          <td>{{$outlet->alamat}}</td>
          <td>{{$outlet->tlp}}</td>
          <td>
            <a href="/outlet/{{$outlet->id}}/edit" class="genric-btn warning-border small">Edit</a>
            <a href="/outlet/{{$outlet->id}}/delete" class="genric-btn danger-border small">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection