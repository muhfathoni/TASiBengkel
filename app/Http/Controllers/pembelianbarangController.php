<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pembelianbarangController extends Controller
{
    public function index(Request $Request)
    {   
        return view ('pembelian');
    }
}
