<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputmitra;

class inputmitraController extends Controller
{
    public function index(Request $Request)
    {
            $inputmitra = inputmitra::all();    

        return view ('mitra')->with ("inputmitra", $inputmitra);
    }
}
