<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\tb_transaksi;
use App\tb_detail_transaksi;
use App\tb_member;
use App\tb_paket;
use Str;
use PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $data_member = tb_member::all();
        $data_transaksi = tb_transaksi::where('id_outlet', '=', auth()->user()->id_outlet)->get();
        return view('transaksi.index', compact('data_transaksi','data_member'));
    }

    public function store(Request $request)
    {
        $data_transaksi = new tb_transaksi;
        $data_transaksi->id_outlet = auth()->user()->id_outlet;
        $data_transaksi->kode_invoice = str::random(10);
        $data_transaksi->id_member = $request->id_member;
        $data_transaksi->tgl = date('Y-m-d');
        $data_transaksi->batas_waktu = $request->date;
        $data_transaksi->biaya_tambahan = $request->biaya_tambahan;
        $data_transaksi->diskon = $request->diskon;
        $data_transaksi->pajak = $request->pajak;
        $data_transaksi->status = 'baru';
        $data_transaksi->dibayar = 'belum_dibayar';
        $data_transaksi->id_user = auth()->user()->id;
        if($data_transaksi->id_member == null) {
            return redirect('/keranjang')->with('hapus', 'Pilih member terlebih dahulu !');
        }elseif($data_transaksi->batas_waktu == null) {
            return redirect('/keranjang')->with('hapus', 'Pilih batas waktu terlebih dahulu !');
        }else{
        $data_transaksi->save();
        }
        // Mengubah Status Keranjang
        tb_detail_transaksi::where('status','=','keranjang')
                            ->update([
                                'status' => 'proses',
                                'id_transaksi' => $data_transaksi->id
                            ]);
      
        return redirect('/transaksi');
        
        
    }
    
    // Kodingan cetakpdf
    public function cetakpdf()
    {
        $data_transaksi = tb_transaksi::where('id_outlet', '=', auth()->user()->id_outlet)->get();
        $pdf = PDF::loadview('cetak.cetakpdf', ['data_transaksi' => $data_transaksi]);
        return $pdf->download('laporan_transaksi.pdf');
    }

    public function tglbayar(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'dibayar' => 'dibayar',
            'tgl_bayar' => date('Y-m-d')
        ]);

        return redirect('/transaksi');
    }

    public function biayatambahan(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'biaya_tambahan' => $request->biaya_tambahan
        ]);
        
        return redirect('/transaksi');

        
    }

    public function pajak(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'pajak' => $request->pajak
        ]);
    
        return redirect('/transaksi');

    }
    

    public function diskon(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'diskon' => $request->diskon
        ]);
        
        return redirect('/transaksi');
    }

    public function proses(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'status' => 'proses'
        ]);

        return redirect('/transaksi');
    }

    public function selesai(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'status' => 'selesai'
        ]);

        return redirect('/transaksi');
    }

    public function diambil(Request $request, $id)
    {
        $data_transaksi = tb_transaksi::where('id', $id);
        $data_transaksi->update([
            'status' => 'diambil'
        ]);

        return redirect('/transaksi');
    }

    public function datatransaksi()
    {
        $data_transaksi = tb_transaksi::where('id_outlet','=', auth()->user()->id_outlet)->paginate(5);
        return view('transaksi.index', compact('data_transaksi'));
    }

    public function transaksiadmin()
    {
        $data_transaksi = tb_transaksi::where('id_outlet','=', auth()->user()->id_outlet)->paginate(5);
        return view('transaksi.index', compact('data_transaksi'));
    }

    public function riwayat()
    {
        $data_transaksi = tb_transaksi::where('id_outlet','=', auth()->user()->id_outlet)->get();
        return view('riwayat.index', compact('data_transaksi'));
    }

    public function detail()
    {
        $data_paket = tb_paket::all();
        $data_member = tb_member::all();
        $data_transaksi = tb_transaksi::where('id_outlet', '=', auth()->user()->id_outlet)->get();
        return view('transaksi.detail', compact('data_transaksi','data_member','data_paket'));
    }
}
