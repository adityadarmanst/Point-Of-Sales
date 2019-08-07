<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class kategoriCon extends Controller
{
    //
    public function kategoriTampil()
    {
        $kategori = DB::table('tbl_kategori') -> get();
        return view('page.dashboard.kategori',['kategori' => $kategori]);
    }

}
