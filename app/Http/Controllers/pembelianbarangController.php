<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembelianbarang;
use App\addtocart;
use Auth;
use Carbon\Carbon;

class pembelianbarangController extends Controller
{
	public function index()
	{   
		$pembelian = pembelianbarang::where('customer_id',Auth::user()->id)->get();
		$data['result'] = $pembelian;

		$notif = addtocart::where('user_id', Auth::user()->id)->get();
		return view ('pembelian', compact('notif', 'pembelian'));

		// dd($data);
		// return view ('pembelian')->with("pembelian", $pembelian);
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

	public function pembayaran(Request $request, $id){

		$filename = $request->file('buktipembayaran')->storeAs('img_bukti', Carbon::now()->timestamp.'.'.$request->file('buktipembayaran')->extension());

		// dd($filename)

		// $namafoto = '/storage/'. $filename;
		$namafoto = $filename;

		$buktipembayaran = pembelianbarang::where('id',$request->id)->update(['bukti_pembayaran' => $namafoto]); 

		return redirect()->route('pembelian');

	}
}
