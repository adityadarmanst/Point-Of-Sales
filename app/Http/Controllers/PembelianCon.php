<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelianCon extends Controller
{
    public function pembelianTampilForm()
    {
      $bahanTransaksi = "1234567890";
      $noTransaksi = substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4);
      $noTransaksi2Cap = substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4);
      $produk = DB::table('tbl_produk') -> get();
      $supplier = DB::table('tbl_supplier') -> get();

      return view('page.pembelian.formPembelian',['produk' => $produk,'supplier' => $supplier, 'noTransaksi' => $noTransaksi, 'noTransaksi2Cap' => $noTransaksi2Cap]);
    }

    public function pembelianTambahProduk(Request $request)
    {
      // 'kodeProduk':kodeProduk,'noFaktur':noFaktur,'jumlahBarang':jumlahBarang
        //cek Faktur
        //DB::table('tbl_transaksi') -> where ('no_transaksi')
        $kodeProduk = $request -> kodeProduk;
        $noFaktur = $request -> noFaktur;
        $jumlahBarang = $request -> jumlahBarang;
        //DB::('tbl_')
        return \Response::json($request);
    }

    public function testPostman(Request $request)
    {
      return \Response::json($request);
    }

}
