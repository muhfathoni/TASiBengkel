<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alamat;
use Auth;
use App\addtocart;

class alamatController extends Controller
{
	public function index()
	{   
		$notif = addtocart::where('user_id', Auth::user()->id)->get();
		return view ('alamat', compact('notif'));

	}

	public function store(Request $request)
	{
		$alamat = new alamat();

		$alamat->customer_id = Auth::user()->id;
		$alamat->nama_penerima = $request->namaPenerima;
		$alamat->alamat = $request->alamat;
		// dd($pembelian)
		$alamat->save();

		return redirect()->route('home');
	}

	public function profile(){
		$alamat = alamat::where('customer_id', Auth::user()->id)->get();
		$notif = addtocart::where('user_id', Auth::user()->id)->get();
		return view ('profile', compact('alamat', 'notif'));
	}

}