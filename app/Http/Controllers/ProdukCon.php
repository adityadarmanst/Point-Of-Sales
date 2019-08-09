<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukCon extends Controller
{
    //
    public function produkTampil()
    {
      $produk = DB::table('tbl_produk') -> get();
      return view('page.produk.produk',['produk' => $produk]);
    }

    public function produkFormTambahTampil()
    {
      $kategori = DB::table('tbl_kategori') -> get();
      return view('page.produk.formTambahProduk',['kategori' => $kategori]);
    }

    public function produkTambahProses(Request $request)
    {
      $data['status'] = 'berhasil';
      return \Response::json($data);
    }
}
