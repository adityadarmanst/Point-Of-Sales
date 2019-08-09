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
}
