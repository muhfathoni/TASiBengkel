<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\transaksi;
use App\transaksibarang;

class transaksiController extends Controller
{
	public function index()
	{
		$namabarang = transaksibarang::all();
		$pembelian = transaksi::where('id_user', Auth::user()->id)->get();

		$data['result'] = $namabarang;

		// dd($namabarang->barangtransaksi()->first());

		return view ('pembelian')->with ("pembelian", $pembelian)-> with ("namabarang", $namabarang);
	}}
