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


    public function logOut()
    {
       $operator = session('userSession');
        DB::table('tbl_transaksi') -> where('active','n') -> where('operator' , $operator) -> delete();
        session()->flush();
        return redirect('/');
    }

}
