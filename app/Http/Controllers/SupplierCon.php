<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierCon extends Controller
{
    //
    public function supplierTampil()
    {
            $supplier = DB::table('tbl_supplier') -> get();
            return view('page.supplier.supplier',['supplier' => $supplier]);
    }

    public function supplierFormTambahTampil()
    {
      return view('page.supplier.formTambahSupplier');
    }

    public function supplierProsesTambah(Request $request)
    {
        $kodeSup = $request -> kodeSup;
        $namaSup = $request -> namaSup;
        $alamatSup = $request -> alamatSup;
        $emailSup = $request -> emailSup;
        $hpSup = $request -> hpSup;
        $createdAt = date("Y-m-d H:i:s");
        $data['status'] = 'berhasil';
        DB::table('tbl_supplier')->insert(['kode' => $kodeSup, 'nama_lengkap' => $namaSup, 'alamat' => $alamatSup, 'no_hp' => $hpSup, 'email' => $emailSup, 'active' => 'y', 'created_at' => $createdAt ]);
        return \Response::json($data);
    }

    public function supplierFormEditTampil(Request $request)
    {
      $kodeSup = $request -> kodeSup;
      $dataSupplier = DB::table('tbl_supplier') -> where('kode', $kodeSup) -> first();
      return view('page.supplier.formEditSupplier',['supplier' => $dataSupplier]);
    }

    public function supplierProsesEdit(Request $request)
    {
      // 'kodeSup':kodeSup,'namaSup':nama,'alamatSup':alamat,'hpSup':hp,'emailSup':email
      $data['status'] = 'berhasil';
      $kodeSup = $request -> kodeSup;
      $namaSup = $request -> namaSup;
      $alamatSup = $request -> alamatSup;
      $hpSup = $request -> hpSup;
      $emailSup = $request -> emailSup;
      $updatedAt = date("Y-m-d H:i:s");
      DB::table('tbl_supplier') -> where('kode',$kodeSup) -> update(['nama_lengkap' => $namaSup, 'updated_at' => $updatedAt,'alamat' => $alamatSup, 'no_hp' => $hpSup, 'email' => $emailSup]);
      return \Response::json($data);
    }

    public function supplierHapusProses(Request $request)
    {
      $kodeSup = $request -> kodeSup;
      $data['status'] = 'berhasil';
      DB::table('tbl_supplier') -> where('kode',$kodeSup) -> delete();
      return \Response::json($data);
    }

}
