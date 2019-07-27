<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageCon extends Controller
{
    public function login()
    {
        return view('page.loginPage');
    }

    public function about()
    {
        // return \Response::json([
        //     'type' => 'error',
        //     'message' => 'Pesan'
        // ]);
        return view('page.about');
    }

    public function testJson(Request $request)
    {
        $suppliers = DB::table('suppliers')->where('kode','09001902221')->get();
        return $request->nama;
        //return \Response::json($suppliers);

    }

    public function updateSup(Request $request)
    {
        $namaSupbaru = $request -> nama;
        DB::table('suppliers')->where('kode','09001902221')->update(['nama_lengkap' => $namaSupbaru]);
        return 'Sudah di update';
    }

    public function editForm()
    {
        return '<b>Tebal</b>';
    }

}
