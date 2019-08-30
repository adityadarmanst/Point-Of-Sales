<?php

Route::get('/', 'PageCon@login');
Route::get('/about','PageCon@about');

// Untuk login proses
Route::post('/prosesLogin','PageCon@loginProses');

//halaman dashboard
Route::get('/dashboard', 'DashboardCon@home');
Route::get('/beranda','DashboardCon@beranda');
Route::get('/transaksi/pembelian','PembelianCon@pembelianTampilForm');
Route::get('/transaksi/penjualan','PenjualanCon@penjualanTampilForm');
//halaman supplier
Route::get('/supplier/tampil','SupplierCon@supplierTampil');
Route::get('/supplier/formTambahTampil','SupplierCon@supplierFormTambahTampil');
Route::post('/supplier/prosesTambah','SupplierCon@supplierProsesTambah');
Route::post('/supplier/formEditTampil','SupplierCon@supplierFormEditTampil');
Route::post('/supplier/prosesEdit','SupplierCon@supplierProsesEdit');
Route::post('/supplier/hapusProses','SupplierCon@supplierHapusProses');
//kategori
Route::get('/kategori/tampil','KategoriCon@kategoriTampil');
Route::post('/kategori/tambahProses','KategoriCon@kategoriTambahProses');
Route::post('/kategori/hapusProses','KategoriCon@kategoriHapusProses');
Route::post('/kategori/editData','KategoriCon@kategoriEditData');
Route::post('/kategori/editProses','KategoriCon@kategoriEditProses');
//Produk
Route::get('/produk/tampil','ProdukCon@produkTampil');
Route::get('/produk/formTambahTampil','ProdukCon@produkFormTambahTampil');
Route::post('/produk/tambahProses','ProdukCon@produkTambahProses');
Route::get('/produk/ambilInfoKategori','ProdukCon@produkAmbilInfoKategori');
Route::post('/produk/formEditTampil','ProdukCon@produkFormEditTampil');
Route::post('/produk/prosesEdit','ProdukCon@produkEditProses');
Route::post('/produk/hapusProses','ProdukCon@produkHapusProses');
Route::post('/produk/detailProduk','ProdukCon@produkHapusProses');
Route::get('/produk/resetStok','ProdukCon@resetStok');
//pembelian
Route::post('/transaksi/tambahProduk','PembelianCon@pembelianTambahProduk');
Route::get('/transaksi/keranjangPembelian/{noTransaksi}','PembelianCon@keranjangPembelian');
Route::post('/transaksi/hapusItemKeranjangPembelian','PembelianCon@hapusItemKeranjang');
Route::post('/transaksi/updateHargaKeranjangPembelian','PembelianCon@updateHargaKeranjangPembelian');
Route::post('/transaksi/checkOutPembelian','PembelianCon@checkOutPembelian');
//untuk proses logout
Route::get('/logOut', 'DashboardCon@logOut');


//untuk testing
Route::get('/testJson/{id}','pageCon@testJson');
Route::post('/updateSup', 'pageCon@updateSup');
Route::get('/editForm', 'PageCon@editForm');
