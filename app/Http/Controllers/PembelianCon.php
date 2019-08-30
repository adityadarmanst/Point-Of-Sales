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
      DB::table('tbl_transaksi') -> insert(['no_transaksi' => $noTransaksi,'jenis_transaksi' => 'pembelian', 'jumlah_produk' => 0, 'total_biaya' => 0, 'active' => 'n', 'tipe_pembayaran' => '', 'total_dibayar' => 0, 'sisa_pembayaran' => 0, 'operator' => $userLogin, 'kd_supplier' => '','created_at' => $createdAt, 'status_pembayaran' => 'belum_lunas']);
      $supplier = DB::table('tbl_supplier') -> get();
      return view('page.pembelian.formPembelian',['produk' => $produk,'supplier' => $supplier, 'noTransaksi' => $noTransaksi, 'noTransaksi2Cap' => $noTransaksi2Cap, 'supplier' => $supplier]);
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

       return view('page.pembelian.keranjangPembelian', ['keranjang' => $keranjang, 'noTransaksi' => $noTransaksi]);
    }

    public function hapusItemKeranjang(Request $request)
    {
      $data['status'] = 'tes';
      DB::table('tbl_temp_transaksi') -> where('id', $request->idTemp) -> delete();
      return \Response::json($data);
    }

    public function updateHargaKeranjangPembelian(Request $request)
    {

      $totalharga = 0;
      $noTransaksi = $request -> noTransaksi;
      $dataTransaksi = DB::table('tbl_temp_transaksi') -> where('no_transaksi', $noTransaksi) -> sum('total_harga');
      $data['harga'] = number_format($dataTransaksi);
      return \Response::json($data);
    }

    public function preCheckout(Request $request)
    {
      $data['status'] = '';
      return \return response($data);
    }

    public function checkOutPembelian(Request $request)
    {
      $data['status'] = '';
      $noTransaksi = $request -> noTransaksi;
      $kdSupplier = $request -> kdSupplier;
      $tipePembayaran = $request -> tipePembayaran;
      $updatedAt = date("Y-m-d H:i:s");
      //cek apakah transaksi kosong
      $jumlah = DB::table('tbl_temp_transaksi') -> where('no_transaksi',$noTransaksi) -> count();
      $listTransaksi = DB::table('tbl_temp_transaksi') -> where('no_transaksi',$noTransaksi) -> get();
      $totalBarang = 0;
      if($jumlah < 1){
        $data['status'] = 'no_record';
      }else{
        $totalHargaPembelian = 0;
        foreach($listTransaksi as $ls){
          //tangkap jumlah pembelian per produk
          $jumlahPembelianTemp = $ls -> jumlah_produk;
          $totalPembelian = $ls -> total_harga;
          $totalHargaPembelian = $totalHargaPembelian + $totalPembelian;
          //ambil kode produk
          $kdProduk = $ls -> kode_produk;
          //ambil jumlah produk di tabel produk
          $dataProduk = DB::table('tbl_produk') -> where('kode', $kdProduk) -> first();
          $stokAwal = $dataProduk -> stok;
          $stokAkhir = $jumlahPembelianTemp + $stokAwal;
          //update total stok
          DB::table('tbl_produk') -> where('kode', $kdProduk) -> update(['stok' => $stokAkhir]);
        }
        //update data transaksi
        // $data['total_barang'] = $totalBarang;
        if($tipePembayaran == '01'){
          DB::table('tbl_transaksi') -> where('no_transaksi',$noTransaksi) -> update(['total_biaya' => $totalHargaPembelian,'kd_supplier' => $kdSupplier,'tipe_pembayaran' => '01','status_pembayaran' => 'lunas','total_dibayar' => $totalHargaPembelian, 'sisa_pembayaran' => 0,'updated_at' => $updatedAt]);
        }elseif($tipePembayaran == '02'){
          
        }
      }
      return \Response::json($data);
    }


    public function testPostman(Request $request)
    {
      return \Response::json($request);
    }

}
