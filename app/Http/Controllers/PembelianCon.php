<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelianCon extends Controller
{
    public function pembelianTampilForm()
    {
      $users = DB::table('tbl_transaksi')->count();
      return $users;
    }
}
