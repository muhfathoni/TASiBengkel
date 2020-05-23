<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\produk;
use App\transaksibarang;
use App\addtocart;
use Auth;

class midtransController extends Controller
{
	public function __construct() {

		\Midtrans\Config::$serverKey = 'SB-Mid-server-Qby1yETeqZXvWCVrvsOEE9pH';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
	}

	public function getToken(Request $Request){
		$transaksi = transaksi::create(
			[
				'id_user' => Auth::user()->id,
				'total' => $Request->harga,
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			]
		);
		
		$item_details = array();

		foreach ($Request->id_barang as $index => $id) {
			$transaksibarang = transaksibarang::create(
				[
					'id_order' => $transaksi->id,
					'id_barang' => $id
				]
			);

			$barang = produk::find($id);
			$item_details[$index] = array(
				'id' => $id,
				'price' => $barang->harga,
				'quantity' => 1,
				'name' => $barang->nama,
			);

			
		}

		$params = array(
			'transaction_details' => array(
				'order_id' => $transaksi->id,
				'gross_amount' => $Request->harga,
			),
			'customer_details' => array(
				'first_name'    => Auth::user()->name, //optional
				'last_name'     => "", //optional
				'email'         => Auth::user()->email, //mandatory
				'phone'         => Auth::user()->phone, //mandatory
			),
			'item_details' => $item_details
		);

		$snapToken = \Midtrans\Snap::getSnapToken($params);
		return $snapToken;
	}

	public function notification(Request $Request)
	{
		$notif = new \Midtrans\Notification();

		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		$transaksi = transaksi::find($order_id);

		if ($transaction == 'capture') {
			// For credit card transaction, we need to check whether transaction is challenge by FDS or not
			if ($type == 'credit_card'){
			  if($fraud == 'challenge'){
				// TODO set payment status in merchant's database to 'Challenge by FDS'
				// TODO merchant should decide whether this transaction is authorized or not in MAP
				echo "Transaction order_id: " . $order_id ." is challenged by FDS";
				$transaksi->status = 'challenged';
				}
				else {
				// TODO set payment status in merchant's database to 'Success'
				echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
				$transaksi->status = 'success';
				}
			  }
			}
		else {
			echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
			$transaksi->status = $transaction;
		}

		$transaksi->save();

		if ($transaksi->status == 'settlement' || $transaksi->status == 'success') {
			$transaksibarang = transaksibarang::where('id_order',$transaksi->id)->get();
			foreach ($transaksibarang as $key => $val) {
				$barang = produk::where('id',$val->id_barang)->decrement('stock',1);
				$addtocart = addtocart::where('user_id',$transaksi->id_user)->where('produk_id',$val->id_barang)->delete();
			}
		}
	}

	public function finish(Request $Request)
	{
		$transaksi = transaksi::find($Request->order_id);
		// $transaksi->status = $Request->transaction_status;
		// $transaksi->save();

		if ($transaksi->status == 'settlement' || $transaksi->status == 'success') {
			$transaksibarang = transaksibarang::where('id_order',$transaksi->id)->get();
			foreach ($transaksibarang as $key => $val) {
				$barang = produk::where('id',$val->id_barang)->decrement('stock',1);
				$addtocart = addtocart::where('user_id',$transaksi->id_user)->where('produk_id',$val->id_barang)->delete();
			}
		}

		return $transaksi;
	}

}
