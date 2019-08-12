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

    public function produkAmbilInfoKategori()
    {
      return "data";
    }

    public function produkFormTambahTampil()
    {
      $kategori = DB::table('tbl_kategori') -> get();
      $satuan = DB::table('tbl_satuan') -> get();
      return view('page.produk.formTambahProduk',['kategori' => $kategori, 'satuan' => $satuan]);
    }

    public function produkTambahProses(Request $request)
    {
      // 'kodeProduk':kodeProduk,'namaProduk':namaProduk,'satuan':satuan,
      // 'kategori':kategori,'deksripsi':deksripsi,'hargaJual':hargaJual
      $data['status'] = 'berhasil';
      $kodeProduk = $request -> kodeProduk;
      $namaProduk = $request -> namaProduk;
      $satuan = $request -> satuan;
      $kategori = $request -> kategori;
      $deksripsi = $request -> deksripsi;
      $hargaJual = $request -> hargaJual;
      $createdAt = date("Y-m-d H:i:s");
      // DB::table('tbl_supplier')->insert(['kode' => $kodeSup, 'nama_lengkap' => $namaSup, 'alamat' => $alamatSup, 'no_hp' => $hpSup, 'email' => $emailSup, 'active' => 'y', 'created_at' => $createdAt ]);
      DB::table('tbl_produk')->insert(['kode' => $kodeProduk, 'nama' => $namaProduk, 'kategori' => $kategori, 'satuan' => $satuan, 'deksripsi' => $deksripsi, 'harga_jual' => $hargaJual, 'stok' => '0', 'created_at' => $createdAt]);
      return \Response::json($data);
    }

    public function produkFormEditTampil(Request $request)
    {
      $kodeProduk = $request -> kodeProduk;
      $kategori = DB::table('tbl_kategori') -> get();
      $satuan = DB::table('tbl_satuan') -> get();
      $dataProduk = DB::table('tbl_produk') -> where('kode', $kodeProduk) -> first();
      return view('page.produk.formEditProduk',['dataProduk' => $dataProduk, 'kategori' => $kategori, 'satuan' => $satuan]);
    }

    public function produkHapusProses(Request $request)
    {
      $data['status'] = 'berhasil';
      $kodeProduk = $request -> kodeProduk;
      DB::table('tbl_produk') -> where('kode',$kodeProduk) -> delete();
      return \Response::json($data);
    }

}
