<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembelianbarang;
use App\addtocart;
use Auth;

class pembelianbarangController extends Controller
{
	public function index()
	{   
		$pembelian = pembelianbarang::where('customer_id',Auth::user()->id)->get();
		$data['result'] = $pembelian;

		// dd($data);
		return view ('pembelian')->with("pembelian", $pembelian);
	}

	public function store(Request $request)
	{
		$pembelian = new pembelianbarang();
		$checkout = addtocart::where('user_id', Auth::user()->id);

		$pembelian->customer_id = Auth::user()->id;
		$pembelian->totalHarga = $request->totalHarga;
		$pembelian->produk_id = $request->produk_id;
		

		$pembelian->save();
		$checkout->delete();

		return redirect()->route('alamat');
	}
}
