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

Route::get('/', 'PageCon@login');
Route::get('/about','PageCon@about');

// Untuk login proses
Route::post('/prosesLogin','PageCon@loginProses');
  

//halaman dashboard
Route::get('/dashboard', 'DashboardCon@home');
Route::get('/beranda','DashboardCon@beranda');

//kategori
Route::get('/kategori/tampil','KategoriCon@kategoriTampil');
Route::post('/kategori/tambahProses','KategoriCon@kategoriTambahProses');
Route::post('/kategori/hapusProses','KategoriCon@kategoriHapusProses');
Route::post('/kategori/editData','KategoriCon@kategoriEditData');

//untuk proses login
Route::get('/logOut', 'DashboardCon@logOut');


//untuk testing
Route::post('/testJson','pageCon@testJson');
Route::post('/updateSup', 'pageCon@updateSup');
Route::get('/editForm', 'PageCon@editForm');



