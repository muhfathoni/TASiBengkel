<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alamatController extends Controller
{
	public function index(Request $Request)
	{   
		return view ('alamat');
	}
}
