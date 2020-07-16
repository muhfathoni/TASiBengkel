<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addtocart;
use Auth;

class syaratpembelianController extends Controller
{
	public function index()
	{
		$notif = addtocart::where('user_id', Auth::user()->id)->get();

		return view ('syaratpembelian', compact('notif'));
	}
}
