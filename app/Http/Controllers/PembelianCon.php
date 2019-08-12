<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelianCon extends Controller
{
    public function pembelianTampilForm()
    {
      $totalTransaksi = DB::table('tbl_transaksi') -> where ('jenis_transaksi','pembelian') -> count();
      $supplier = DB::table('tbl_supplier') -> get();
      return view('page.pembelian.formPembelian',['supplier' => $supplier]);
    }
}
