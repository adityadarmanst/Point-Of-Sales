<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageCon extends Controller
{
    public function login()
    {
        return view('page.login');
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

}
