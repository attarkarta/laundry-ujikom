<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});


// Login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');

// Logout
Route::get('/logout','AuthController@logout');

// Login juga
Route::group(['middleware' => ['auth', 'checkRole:superadmin,admin']],function(){
    Route::get('/dashboard', 'DashboardController@index');
    
    //Owner
    Route::get('/owner','OwnerController@index');
    //Owner Create
    Route::get('/owner/tampiltambah','OwnerController@tampiltambah');
    Route::post('/owner/tambah','OwnerController@create');
    //Owner Delete
    Route::get('/owner/{id}/delete','OwnerController@delete');

    // Kasir
    Route::get('/kasir','KasirController@index');
    // Kasir Create
    Route::get('/kasir/tampiltambah','KasirController@tampiltambah');
    Route::post('/kasir/tambah','KasirController@create');
    //Kasir Update
    Route::get('/kasir/{id}/edit','KasirController@edit');
    Route::post('/kasir/{id}/update','KasirController@update');
    // Kasir Delete
    Route::get('/kasir/{id}/delete','KasirController@delete');

    // Outlet
    Route::get('/outlet', 'OutletController@index');
    // Outlet Create
    Route::get('/outlet/tampiltambah','OutletController@tampiltambah');
    Route::post('/outlet/tambah','OutletController@create');
    // Outlet Update
    Route::get('/outlet/{id}/edit','OutletController@edit');
    Route::post('/outlet/{id}/update','OutletController@update');
    // Outlet Delete
    Route::get('/outlet/{id}/delete','OutletController@delete');

    //Paket
    Route::get('/paket','PaketController@index');
    //Paket Create
    Route::get('/paket/tampiltambah','PaketController@tampiltambah');
    Route::post('/paket/tambah','PaketController@create');
    // Paket Update
    Route::get('/paket/{id}/edit','PaketController@edit');
    Route::post('/paket/{id}/update','PaketController@update');
    //Paket Delete
    Route::get('/paket/{id}/delete','PaketController@delete'); 
}); 


Route::group(['middleware' => ['auth', 'checkRole:admin,kasir']],function(){
    Route::get('/dashboard', 'DashboardController@index');

     //Pilih Paket
     Route::get('/pilihpaket','PilihPaketController@index');
     Route::post('/postkeranjang/{id}','KeranjangController@store');
 
     //Keranjang
     Route::get('/keranjang', 'KeranjangController@index');
     //Keranjang Update
     Route::get('/keranjang/{id}/edit','KeranjangController@edit');
     Route::post('/keranjang/{id}/update','KeranjangController@update');
     //Keranjang Hapus
     Route::get('/keranjang/{id}/delete','KeranjangController@delete');

    //  / Data Transaksi
    Route::get('/riwayat','TransaksiController@riwayat');  
});


Route::group(['middleware' => ['auth', 'checkRole:owner']],function(){
    Route::get('/dashboard', 'DashboardController@index');  
   
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,admin,kasir']],function(){
    Route::get('/dashboard', 'DashboardController@index');
    
    // Member
    Route::get('/member','MemberController@index');
    //Member Create
    Route::get('/member/tampiltambah','MemberController@tampiltambah');
    Route::post('/member/tambah','MemberController@create');
    //Member Update
    Route::get('/member/{id}/edit','MemberController@edit');
    Route::post('/member/{id}/update','MemberController@update');
    //Member Delete
    Route::get('/member/{id}/delete','MemberController@delete');

});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,admin,kasir,owner']],function(){
    Route::get('/dashboard', 'DashboardController@index');
    
    //Transaksi
    Route::get('/transaksi','TransaksiController@index');
    Route::post('/posttransaksi','TransaksiController@store');
    Route::post('/transaksi/tglbayar/{id}','TransaksiController@tglbayar');
    Route::post('/transaksi/biayatambahan/{id}','TransaksiController@biayatambahan');
    Route::post('/transaksi/diskon/{id}','TransaksiController@diskon');
    Route::post('/transaksi/pajak/{id}','TransaksiController@pajak');
    Route::post('/transaksi/detail/{id}','TransaksiController@detail');

    // Transaksi Konfirmasi Status
    Route::post('/konfirmasi/selesai/{id}/proses','TransaksiController@proses');
    Route::post('/konfirmasi/selesai/{id}/selesai','TransaksiController@selesai');
    Route::post('/konfirmasi/selesai/{id}/diambil','TransaksiController@diambil');
     //cetakpdf
     Route::get('/transaksi/cetakpdf','TransaksiController@cetakpdf');

     //Tess
     Route::get('/session/buat','TransaksiController@peringatan');
});

Route::group(['middleware' => ['auth', 'checkRole:superadmin']],function(){
   
    //Admin
    Route::get('/admin','AdminController@index');
    //Admin Create
    Route::get('/admin/tampiltambah','AdminController@tampiltambah');
    Route::post('/admin/tambah','AdminController@create');
    //Admin Update
    Route::get('/admin/{id}/edit','AdminController@edit');
    Route::post('/admin/{id}/update','AdminController@update');
    //Admin Delete
    Route::get('/admin/{id}/delete','AdminController@delete');
});
    