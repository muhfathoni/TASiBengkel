<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputmitra;
use App\addtocart;
use Auth;

class inputmitraController extends Controller
{
    public function index(Request $Request)
    {
            $inputmitra = inputmitra::all();    
            $notif = addtocart::where('user_id', Auth::user()->id)->get();
        

        return view ('mitra', compact('inputmitra', 'notif'));
    }
}
