<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		$params = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => $Request->harga,
			)
		);

		$snapToken = \Midtrans\Snap::getSnapToken($params);
		return $snapToken;
	}

}
