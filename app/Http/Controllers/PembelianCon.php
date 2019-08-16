<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelianCon extends Controller
{
    public function pembelianTampilForm()
    {
      $userLogin = session('userSession');
      $bahanTransaksi = "1234567890";
      $noTransaksi = substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4).substr(str_shuffle($bahanTransaksi), 0, 4);
      $noTransaksi2Cap = substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4)."-".substr(str_shuffle($bahanTransaksi), 0, 4);
      $produk = DB::table('tbl_produk') -> get();
      $supplier = DB::table('tbl_supplier') -> get();
      $createdAt = date("Y-m-d H:i:s");
      //tambahkan data faktur ke database
      DB::table('tbl_transaksi') -> insert(['no_transaksi' => $noTransaksi,'jenis_transaksi' => 'pembelian', 'jumlah_produk' => 0, 'total_biaya' => 0, 'active' => 'n', 'operator' => $userLogin, 'created_at' => $createdAt]);
      return view('page.pembelian.formPembelian',['produk' => $produk,'supplier' => $supplier, 'noTransaksi' => $noTransaksi, 'noTransaksi2Cap' => $noTransaksi2Cap]);
    }

    public function pembelianTambahProduk(Request $request)
    {

        $kodeProduk = $request -> kodeProduk;
        $noTransaksi = $request -> noTransaksi;
        $jumlahProduk = $request -> jumlahProduk;
        $dataProduk = DB::table('tbl_produk') -> where('kode', $kodeProduk) -> first();
        // $dataProduk = DB::table('tbl_produk') -> where('kode', $kodeProduk) -> first();
        $hargaProduk = $dataProduk   -> harga_jual;
        $totalHarga = $hargaProduk * $jumlahProduk;
        $createdAt = date("Y-m-d H:i:s");
        //sebelum data di simpan, kita harus memperhatikan apakah ada produk yang sama yang masuk,
        //jika iya, maka lakukan query untuk mengupdate data tersebut
        $qtProduk = DB::table('tbl_temp_transaksi') -> where('no_transaksi', $noTransaksi) -> where('kode_produk', $kodeProduk) -> count();
        if($qtProduk > 0){
          $produkAda = DB::table('tbl_temp_transaksi') -> where('no_transaksi', $noTransaksi) -> where('kode_produk', $kodeProduk) -> first();
          $jlhAwal = $produkAda -> jumlah_produk;
          $hargaAwal = $produkAda -> total_harga;
          $jlhSkrg = $jlhAwal + $jumlahProduk;
          $hargaSekarang = $hargaAwal + $totalHarga;
          DB::table('tbl_temp_transaksi') -> where('no_transaksi', $noTransaksi) -> where('kode_produk', $kodeProduk) -> update(['jumlah_produk' => $jlhSkrg, 'total_harga' => $hargaSekarang]);
          $data['status'] = "update";
        }else{
          //simpan data tambah produk ke tbl_temp_transaksi
          DB::table('tbl_temp_transaksi') -> insert(['no_transaksi' => $noTransaksi, 'kode_produk' => $kodeProduk, 'jumlah_produk' => $jumlahProduk, 'total_harga' => $totalHarga, 'waktu' => $createdAt]);
          $data['status'] = "tambah";
        }
        // //update status transaksi menjadi aktif (belum di checkout)
        DB::table('tbl_transaksi') -> where('no_transaksi', $noTransaksi) -> update(['active' => 'a']);
        return \Response::json($data);
    }

    public function keranjangPembelian($noTransaksi)
    {
      $keranjang = DB::table('tbl_temp_transaksi') -> where('no_transaksi',$noTransaksi) -> get();

       return view('page.pembelian.keranjangPembelian', ['keranjang' => $keranjang]);
    }

    public function testPostman(Request $request)
    {
      return \Response::json($request);
    }

}
