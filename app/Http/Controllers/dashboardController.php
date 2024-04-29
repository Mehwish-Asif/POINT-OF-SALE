<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function admin()
    {
        return view('admindashboard.index');
    }

    public function cashier()
    {
        return view('cashierdashboard.index');
    }
}
