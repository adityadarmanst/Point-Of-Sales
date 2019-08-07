<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardCon extends Controller
{
    public function home()
    {
        //session()->flush();
        if(!session('userSession')){
            return redirect('/');
        }else{
            return view('page.dashboard.main');
        }
    }

    public function beranda()
    {
        return view('page.dashboard.beranda');
    }

    public function kategoriTampil()
    {
        $kategori = DB::table('tbl_kategori') -> get();
        return view('page.dashboard.kategori',['kategori' => $kategori]);
    }

    public function kategoriTambahProses(Request $request)
    {
        $kode = $request -> kode;
        $nama = $request -> nama;
        DB::table('tbl_kategori')->insert(['kode' => $kode, 'nama' => $nama, 'active' => 'y']);
        
    }

    public function kategoriEditData()
    {
        return 'Data';
    }

    public function logOut()
    {
        session()->flush();
        return redirect('/');
    }

}
