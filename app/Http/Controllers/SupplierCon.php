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
            return view('page.dashboard.supplier',['supplier' => $supplier]);
    }

    public function supplierFormTambahTampil()
    {
      return view('page.dashboard.formTambahSupplier');
    }
}
