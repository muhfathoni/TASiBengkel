<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alamat;
use Auth;

class alamatController extends Controller
{
	public function index(Request $Request)
	{   
		return view ('alamat');
	}

	public function store(Request $request)
	{
		$alamat = new alamat();

		$alamat->customer_id = Auth::user()->id;
		$alamat->nama_penerima = $request->namaPenerima;
		$alamat->alamat = $request->alamat;
		// dd($pembelian)
		$alamat->save();

		return redirect()->route('pembelian');
	}
}
