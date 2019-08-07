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

    public function kategoriEditProses(Request $request)
    {
        $idKategori = $request -> kode;
        $nama = $request -> nama;
        $data['status'] = 'berhasil';
        $data['nilai'] = $idKategori.$nama;
        DB::table('tbl_kategori') -> where('kode', $idKategori) -> update(['nama' => $nama]);
        return \Response::json($data);
    }

    public function kategoriHapusProses(Request $request)
    {
        $id = $request -> idKategori;
        $data['status'] = 'berhasil';
        DB::table('tbl_kategori') -> where('kode',$id) -> delete();
        return \Response::json($data);
    }




}
