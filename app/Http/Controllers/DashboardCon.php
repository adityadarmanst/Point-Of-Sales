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

    public function kategoriTambahProses(Request $request)
    {
        $kode = $request -> kode;
        $nama = $request -> nama;
        DB::table('tbl_kategori')->insert(['kode' => $kode, 'nama' => $nama, 'active' => 'y']);
        
    }

    public function kategoriEditData(Request $request)
    {   
        $id = $request -> id;
        $dataKategori = DB::table('tbl_kategori') -> where('kode',$id) -> first();
        return \Response::json($dataKategori);
      
    }

    public function logOut()
    {
        session()->flush();
        return redirect('/');
    }

}
