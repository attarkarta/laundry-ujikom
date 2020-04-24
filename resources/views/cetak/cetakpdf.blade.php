<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laporan Transaksi</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

<h1>Laporan Transaksi</h1>
  <div class="col">
    @if(auth()->user()->role == 'kasir')
    <h5>Nama Kasir : {{auth()->user()->nama}}</h5>
    @elseif(auth()->user()->role == 'owner')
    <h5>Nama Owner : {{auth()->user()->nama}}</h5>
    @else(auth()->user()->role == 'admin')
    <h5>Nama Admin : {{auth()->user()->nama}}</h5>
    @endif
  </div>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
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
      <td>{{$transaksi->tgl}}</td>
      <td>{{$transaksi->batas_waktu}}</td>
      <td>
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
      <td>{{$data_keranjang->tb_paket->harga*$data_keranjang->qty}}</td>
      
    </tr>
  </tbody>
  @endforeach
  </table>

</body>
</html>