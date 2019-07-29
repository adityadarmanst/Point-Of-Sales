<?php

namespace App\Http\Controllers;

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

    public function logOut()
    {
        session()->flush();
        return redirect('/');
    }

}
